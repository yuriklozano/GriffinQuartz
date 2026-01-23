<?php
/**
 * Griffin Quartz - Blog Editor
 * Create and edit blog posts with TinyMCE
 */

require_once dirname(__DIR__) . '/includes/admin-auth.php';
require_admin_login();

$pdo = get_db_connection();

// Get post if editing
$post_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$post = null;
$post_categories = [];
$post_tags = [];
$post_faqs = [];

if ($post_id) {
    $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE id = ?");
    $stmt->execute([$post_id]);
    $post = $stmt->fetch();

    if (!$post) {
        header('Location: /admin/blog/');
        exit();
    }

    // Get post categories
    $stmt = $pdo->prepare("SELECT category_id FROM blog_post_categories WHERE post_id = ?");
    $stmt->execute([$post_id]);
    $post_categories = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Get post tags
    $stmt = $pdo->prepare("SELECT t.name FROM blog_post_tags pt JOIN blog_tags t ON pt.tag_id = t.id WHERE pt.post_id = ?");
    $stmt->execute([$post_id]);
    $post_tags = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Get post FAQs
    $stmt = $pdo->prepare("SELECT * FROM blog_faqs WHERE post_id = ? ORDER BY sort_order");
    $stmt->execute([$post_id]);
    $post_faqs = $stmt->fetchAll();
}

$page_title = $post ? 'Edit Post' : 'New Post';

// Get all categories
$categories = $pdo->query("SELECT * FROM blog_categories ORDER BY name")->fetchAll();

// Get all tags for autocomplete
$all_tags = $pdo->query("SELECT name FROM blog_tags ORDER BY name")->fetchAll(PDO::FETCH_COLUMN);

$extra_head = '
<script src="https://cdn.tiny.cloud/1/mqm6rw1cddziy72qn0wmzrr0guw1pj6ckp5fwg90q0kr8qfq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<style>
    /* Featured Image Upload */
    .featured-image-upload {
        border: 2px dashed #ddd;
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        position: relative;
    }
    .featured-image-upload:hover { border-color: #FDB913; background: #fffef5; }
    .featured-image-upload.has-image { padding: 0; border-style: solid; }
    .featured-image-upload img { max-width: 100%; height: auto; display: block; border-radius: 6px; }
    .featured-image-upload .remove-image {
        position: absolute; top: 0.5rem; right: 0.5rem;
        background: rgba(0,0,0,0.7); color: white; border: none;
        width: 30px; height: 30px; border-radius: 50%; cursor: pointer;
        font-size: 1.25rem; line-height: 1;
    }
    .featured-image-upload .upload-text { color: #666; }
    .featured-image-upload input[type="file"] { display: none; }

    /* Tags Input */
    .tags-input-wrapper {
        display: flex; flex-wrap: wrap; gap: 0.5rem; padding: 0.5rem;
        border: 1px solid #ddd; border-radius: 4px; background: white; min-height: 44px;
    }
    .tags-input-wrapper:focus-within { border-color: #FDB913; box-shadow: 0 0 0 3px rgba(253, 185, 19, 0.1); }
    .tags-input-wrapper .tag {
        display: inline-flex; align-items: center; gap: 0.25rem;
        background: #eee; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem;
    }
    .tags-input-wrapper .tag button {
        background: none; border: none; cursor: pointer; padding: 0; font-size: 1rem; line-height: 1; color: #666;
    }
    .tags-input-wrapper input {
        border: none; outline: none; flex: 1; min-width: 100px; padding: 0.25rem; font-size: 0.875rem;
    }

    /* FAQ Section */
    .faq-item {
        background: #f9f9f9; border: 1px solid #eee; border-radius: 8px; padding: 1rem; margin-bottom: 1rem;
    }
    .faq-item .faq-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem; }
    .faq-item textarea { min-height: 60px; }

    /* Status indicator */
    .autosave-status { font-size: 0.75rem; color: #666; }
    .autosave-status.saving { color: #FDB913; }
    .autosave-status.saved { color: #28a745; }
    .autosave-status.error { color: #dc3545; }

    /* Revisions */
    .revision-list { max-height: 200px; overflow-y: auto; }
    .revision-item { padding: 0.5rem 0; border-bottom: 1px solid #eee; font-size: 0.875rem; }
    .revision-item:last-child { border-bottom: none; }
</style>
';

include dirname(__DIR__) . '/includes/admin-header.php';
?>

<form id="post-form" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="post_id" value="<?= $post_id ?>">

    <div class="page-title-row">
        <h1><?= $post ? 'Edit Post' : 'New Post' ?></h1>
        <div style="display: flex; gap: 1rem; align-items: center;">
            <span class="autosave-status" id="autosave-status"></span>
            <button type="button" class="btn btn-secondary" onclick="saveDraft()">Save Draft</button>
            <button type="submit" name="action" value="publish" class="btn btn-primary">
                <?= $post && $post['status'] === 'published' ? 'Update' : 'Publish' ?>
            </button>
        </div>
    </div>

    <div class="two-col">
        <div class="two-col-main">
            <!-- Title -->
            <div class="form-group">
                <input type="text" id="title" name="title" placeholder="Post title"
                       value="<?= e($post['title'] ?? '') ?>"
                       style="font-size: 1.5rem; font-weight: 600; padding: 1rem;"
                       required>
            </div>

            <!-- Slug -->
            <div class="form-group">
                <label for="slug">URL Slug</label>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: #666;">/blog/</span>
                    <input type="text" id="slug" name="slug" value="<?= e($post['slug'] ?? '') ?>" style="flex: 1;">
                </div>
                <small>Leave empty to auto-generate from title</small>
            </div>

            <!-- Content -->
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content"><?= e($post['content'] ?? '') ?></textarea>
            </div>

            <!-- Excerpt -->
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea id="excerpt" name="excerpt" rows="3" placeholder="Brief summary for listings and SEO..."><?= e($post['excerpt'] ?? '') ?></textarea>
            </div>

            <!-- SEO Section -->
            <div class="card" style="margin-top: 2rem;">
                <div class="card-header">
                    <h2>SEO Settings</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" id="seo_title" name="seo_title" value="<?= e($post['seo_title'] ?? '') ?>" maxlength="60">
                        <small>Recommended: 50-60 characters. <span id="seo-title-count">0</span>/60</small>
                    </div>
                    <div class="form-group">
                        <label for="seo_description">Meta Description</label>
                        <textarea id="seo_description" name="seo_description" rows="2" maxlength="160"><?= e($post['seo_description'] ?? '') ?></textarea>
                        <small>Recommended: 150-160 characters. <span id="seo-desc-count">0</span>/160</small>
                    </div>
                    <div class="form-group">
                        <label for="seo_keywords">Keywords</label>
                        <input type="text" id="seo_keywords" name="seo_keywords" value="<?= e($post['seo_keywords'] ?? '') ?>" placeholder="keyword1, keyword2, keyword3">
                    </div>

                    <h3 style="margin: 1.5rem 0 1rem; font-size: 0.875rem; color: #666;">Open Graph (Social Sharing)</h3>
                    <div class="form-group">
                        <label for="og_title">OG Title</label>
                        <input type="text" id="og_title" name="og_title" value="<?= e($post['og_title'] ?? '') ?>">
                        <small>Leave empty to use SEO title or post title</small>
                    </div>
                    <div class="form-group">
                        <label for="og_description">OG Description</label>
                        <textarea id="og_description" name="og_description" rows="2"><?= e($post['og_description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="card" style="margin-top: 2rem;">
                <div class="card-header">
                    <h2>FAQ (Schema.org)</h2>
                    <button type="button" class="btn btn-sm btn-secondary" onclick="addFaq()">+ Add FAQ</button>
                </div>
                <div class="card-body">
                    <div id="faq-container">
                        <?php foreach ($post_faqs as $i => $faq): ?>
                            <div class="faq-item" data-index="<?= $i ?>">
                                <div class="faq-header">
                                    <strong>FAQ #<?= $i + 1 ?></strong>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeFaq(this)">Remove</button>
                                </div>
                                <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" name="faq_question[]" value="<?= e($faq['question']) ?>" required>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label>Answer</label>
                                    <textarea name="faq_answer[]" required><?= e($faq['answer']) ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <p style="color: #666; font-size: 0.875rem;">FAQs will be rendered as Schema.org FAQPage markup for rich search results.</p>
                </div>
            </div>
        </div>

        <div class="two-col-sidebar">
            <!-- Publish Settings -->
            <div class="card">
                <div class="card-header">
                    <h2>Publish</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="draft" <?= ($post['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                            <option value="scheduled" <?= ($post['status'] ?? '') === 'scheduled' ? 'selected' : '' ?>>Scheduled</option>
                            <option value="published" <?= ($post['status'] ?? '') === 'published' ? 'selected' : '' ?>>Published</option>
                        </select>
                    </div>
                    <div class="form-group" id="schedule-group" style="<?= ($post['status'] ?? '') !== 'scheduled' ? 'display:none;' : '' ?>">
                        <label for="publish_date">Schedule Date</label>
                        <input type="datetime-local" id="publish_date" name="publish_date"
                               value="<?= $post['publish_date'] ? date('Y-m-d\TH:i', strtotime($post['publish_date'])) : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" value="<?= e($post['author'] ?? 'Griffin Quartz Team') ?>">
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="card">
                <div class="card-header">
                    <h2>Featured Image</h2>
                </div>
                <div class="card-body">
                    <div class="featured-image-upload <?= !empty($post['featured_image']) ? 'has-image' : '' ?>" id="featured-image-upload">
                        <?php if (!empty($post['featured_image'])): ?>
                            <img src="<?= e($post['featured_image']) ?>" alt="Featured image" id="featured-preview">
                            <button type="button" class="remove-image" onclick="removeFeaturedImage()">&times;</button>
                        <?php else: ?>
                            <div class="upload-text">
                                <p><strong>Click to upload</strong></p>
                                <p style="font-size: 0.75rem;">or drag and drop</p>
                            </div>
                        <?php endif; ?>
                        <input type="file" id="featured_image_file" name="featured_image_file" accept="image/*">
                        <input type="hidden" id="featured_image" name="featured_image" value="<?= e($post['featured_image'] ?? '') ?>">
                    </div>
                    <div class="form-group" style="margin-top: 1rem;">
                        <label for="featured_image_alt">Alt Text</label>
                        <input type="text" id="featured_image_alt" name="featured_image_alt"
                               value="<?= e($post['featured_image_alt'] ?? '') ?>" placeholder="Describe the image for accessibility">
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div class="card">
                <div class="card-header">
                    <h2>Categories</h2>
                </div>
                <div class="card-body">
                    <div class="checkbox-group">
                        <?php foreach ($categories as $cat): ?>
                            <label>
                                <input type="checkbox" name="categories[]" value="<?= $cat['id'] ?>"
                                       <?= in_array($cat['id'], $post_categories) ? 'checked' : '' ?>>
                                <?= e($cat['name']) ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Tags -->
            <div class="card">
                <div class="card-header">
                    <h2>Tags</h2>
                </div>
                <div class="card-body">
                    <div class="tags-input-wrapper" id="tags-wrapper">
                        <?php foreach ($post_tags as $tag): ?>
                            <span class="tag"><?= e($tag) ?><button type="button" onclick="removeTag(this)">&times;</button></span>
                        <?php endforeach; ?>
                        <input type="text" id="tag-input" placeholder="Add tag..." list="tag-suggestions">
                    </div>
                    <input type="hidden" id="tags" name="tags" value="<?= e(implode(',', $post_tags)) ?>">
                    <datalist id="tag-suggestions">
                        <?php foreach ($all_tags as $tag): ?>
                            <option value="<?= e($tag) ?>">
                        <?php endforeach; ?>
                    </datalist>
                </div>
            </div>

            <?php if ($post_id): ?>
            <!-- Revisions -->
            <div class="card">
                <div class="card-header">
                    <h2>Revisions</h2>
                </div>
                <div class="card-body">
                    <div class="revision-list" id="revision-list">
                        <?php
                        $revisions = $pdo->prepare("SELECT id, revision_note, created_at FROM blog_revisions WHERE post_id = ? ORDER BY created_at DESC LIMIT 10");
                        $revisions->execute([$post_id]);
                        foreach ($revisions->fetchAll() as $rev):
                        ?>
                            <div class="revision-item">
                                <strong><?= format_date($rev['created_at']) ?></strong>
                                <?php if ($rev['revision_note']): ?>
                                    <br><small><?= e($rev['revision_note']) ?></small>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</form>

<template id="faq-template">
    <div class="faq-item">
        <div class="faq-header">
            <strong>FAQ #<span class="faq-number"></span></strong>
            <button type="button" class="btn btn-sm btn-danger" onclick="removeFaq(this)">Remove</button>
        </div>
        <div class="form-group">
            <label>Question</label>
            <input type="text" name="faq_question[]" required>
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <label>Answer</label>
            <textarea name="faq_answer[]" required></textarea>
        </div>
    </div>
</template>

<?php
$extra_scripts = <<<'SCRIPT'
<script>
// Initialize TinyMCE
tinymce.init({
    selector: '#content',
    height: 500,
    menubar: true,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image | code',
    content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; font-size: 16px; line-height: 1.6; }',
    images_upload_url: '/api/blog/upload-image.php',
    automatic_uploads: true,
    images_reuse_filename: false,
    file_picker_types: 'image',
    convert_urls: false,
    relative_urls: false
});

// Auto-generate slug from title
document.getElementById('title').addEventListener('blur', function() {
    const slugField = document.getElementById('slug');
    if (!slugField.value) {
        slugField.value = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-|-$/g, '');
    }
});

// Show/hide schedule date
document.getElementById('status').addEventListener('change', function() {
    document.getElementById('schedule-group').style.display =
        this.value === 'scheduled' ? 'block' : 'none';
});

// SEO character counts
function updateCharCount(inputId, countId, max) {
    const input = document.getElementById(inputId);
    const count = document.getElementById(countId);
    const update = () => {
        count.textContent = input.value.length;
        count.style.color = input.value.length > max ? '#dc3545' : '#666';
    };
    input.addEventListener('input', update);
    update();
}
updateCharCount('seo_title', 'seo-title-count', 60);
updateCharCount('seo_description', 'seo-desc-count', 160);

// Featured image upload
const uploadArea = document.getElementById('featured-image-upload');
const fileInput = document.getElementById('featured_image_file');

uploadArea.addEventListener('click', () => fileInput.click());
uploadArea.addEventListener('dragover', (e) => { e.preventDefault(); uploadArea.style.borderColor = '#FDB913'; });
uploadArea.addEventListener('dragleave', () => { uploadArea.style.borderColor = '#ddd'; });
uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.style.borderColor = '#ddd';
    if (e.dataTransfer.files.length) {
        fileInput.files = e.dataTransfer.files;
        handleFeaturedImage(e.dataTransfer.files[0]);
    }
});

fileInput.addEventListener('change', () => {
    if (fileInput.files.length) {
        handleFeaturedImage(fileInput.files[0]);
    }
});

function handleFeaturedImage(file) {
    const formData = new FormData();
    formData.append('image', file);
    formData.append('type', 'featured');

    fetch('/api/blog/upload-image.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            document.getElementById('featured_image').value = data.location;
            uploadArea.classList.add('has-image');
            uploadArea.innerHTML = `
                <img src="${data.location}" alt="Featured image" id="featured-preview">
                <button type="button" class="remove-image" onclick="removeFeaturedImage()">&times;</button>
                <input type="file" id="featured_image_file" name="featured_image_file" accept="image/*">
                <input type="hidden" id="featured_image" name="featured_image" value="${data.location}">
            `;
        } else {
            alert('Upload failed: ' + data.message);
        }
    })
    .catch(err => alert('Upload error'));
}

function removeFeaturedImage() {
    event.stopPropagation();
    document.getElementById('featured_image').value = '';
    uploadArea.classList.remove('has-image');
    uploadArea.innerHTML = `
        <div class="upload-text">
            <p><strong>Click to upload</strong></p>
            <p style="font-size: 0.75rem;">or drag and drop</p>
        </div>
        <input type="file" id="featured_image_file" name="featured_image_file" accept="image/*">
        <input type="hidden" id="featured_image" name="featured_image" value="">
    `;
    document.getElementById('featured_image_file').addEventListener('change', function() {
        if (this.files.length) handleFeaturedImage(this.files[0]);
    });
}

// Tags input
const tagsWrapper = document.getElementById('tags-wrapper');
const tagInput = document.getElementById('tag-input');
const tagsHidden = document.getElementById('tags');

function updateTagsValue() {
    const tags = [...tagsWrapper.querySelectorAll('.tag')].map(t => t.textContent.replace('×', '').trim());
    tagsHidden.value = tags.join(',');
}

tagInput.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' || e.key === ',') {
        e.preventDefault();
        const value = this.value.trim().replace(',', '');
        if (value) {
            const tag = document.createElement('span');
            tag.className = 'tag';
            tag.innerHTML = value + '<button type="button" onclick="removeTag(this)">&times;</button>';
            tagsWrapper.insertBefore(tag, tagInput);
            this.value = '';
            updateTagsValue();
        }
    }
});

function removeTag(btn) {
    btn.parentElement.remove();
    updateTagsValue();
}

// FAQ management
let faqCount = document.querySelectorAll('.faq-item').length;

function addFaq() {
    faqCount++;
    const template = document.getElementById('faq-template');
    const clone = template.content.cloneNode(true);
    clone.querySelector('.faq-number').textContent = faqCount;
    document.getElementById('faq-container').appendChild(clone);
}

function removeFaq(btn) {
    btn.closest('.faq-item').remove();
    // Renumber
    document.querySelectorAll('.faq-item').forEach((item, i) => {
        item.querySelector('.faq-header strong').textContent = `FAQ #${i + 1}`;
    });
    faqCount = document.querySelectorAll('.faq-item').length;
}

// Autosave
let autosaveTimer;
let lastSavedContent = '';

function autosave() {
    const content = tinymce.get('content')?.getContent() || '';
    const title = document.getElementById('title').value;

    if (!title || content === lastSavedContent) return;

    const statusEl = document.getElementById('autosave-status');
    statusEl.textContent = 'Saving...';
    statusEl.className = 'autosave-status saving';

    const formData = new FormData(document.getElementById('post-form'));
    formData.set('content', content);
    formData.set('autosave', '1');

    fetch('/api/blog/autosave.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            lastSavedContent = content;
            statusEl.textContent = 'Saved';
            statusEl.className = 'autosave-status saved';
            if (data.post_id && !document.querySelector('[name="post_id"]').value) {
                document.querySelector('[name="post_id"]').value = data.post_id;
                history.replaceState(null, '', '?id=' + data.post_id);
            }
        } else {
            statusEl.textContent = 'Save failed';
            statusEl.className = 'autosave-status error';
        }
    })
    .catch(() => {
        statusEl.textContent = 'Save failed';
        statusEl.className = 'autosave-status error';
    });
}

// Setup autosave interval
setInterval(autosave, 60000);

function saveDraft() {
    document.getElementById('status').value = 'draft';
    autosave();
}

// Form submission
document.getElementById('post-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const content = tinymce.get('content')?.getContent() || '';
    const formData = new FormData(this);
    formData.set('content', content);

    fetch('/api/blog/save-post.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.location.href = '/admin/blog/?saved=1';
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(() => alert('Save failed'));
});
</script>
SCRIPT;

include dirname(__DIR__) . '/includes/admin-footer.php';
