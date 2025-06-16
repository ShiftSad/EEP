<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading Post...</title>
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/default.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      line-height: 1.6;
      font-size: 1.2rem;
      color: #333;
      max-width: 1100px;
      margin: 2rem auto;
      padding: 0 2rem;
      background:rgb(238, 227, 248);
    }
    #post-container, #comments-section {
      background-color: #fff;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    #post-container { display: none; }
    #loading-state { text-align: center; color: #888; }
    #error-state { text-align: center; color: #d9534f; }
    h1 { color: #111; }
    .meta { color: #666; font-size: 0.9em; padding-bottom: 1rem; margin-bottom: 1rem; border-bottom: 1px solid #eee;}
    .post-content img { max-width: 100%; height: auto; border-radius: 4px; }
    .post-content code:not(pre > code) {
        background: #e9ecef;
        padding: .2em .4em;
        border-radius: 3px;
        font-size: 85%;
    }
    .post-content pre code {
      border-radius: 4px;
      display: block;
      padding: 1em;
    }

    .comment {
      display: flex;
      gap: 1rem;
      margin-bottom: 1.5rem;
      padding-bottom: 1.5rem;
      border-bottom: 1px solid #e9ecef;
    }
    .comment:last-child {
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }
    .comment-avatar {
      flex-shrink: 0;
      width: 40px;
      height: 40px;
      background-color: #e9ecef;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #6c757d;
    }
    .comment-body { flex-grow: 1; }
    .comment-header {
      display: flex;
      align-items: center;
      margin-bottom: 0.25rem;
    }
    .comment-author {
      font-weight: 600;
      font-size: 0.95rem;
      color: #333;
    }
    .comment-date {
      font-size: 0.8rem;
      color: #888;
      margin-left: 0.75rem;
    }
    .comment-text {
      font-size: 1rem;
      line-height: 1.5;
      color: #444;
      white-space: pre-wrap;
    }
    #comment-form h4 {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 1rem;
    }
  .comment-avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
  }
  </style>
</head>
<body data-post-id="<?php echo htmlspecialchars($post_id ?? '', ENT_QUOTES, 'UTF-8'); ?>">

  <div id="loading-state">
    <h2>Loading post...</h2>
  </div>

  <div id="error-state" style="display: none;"></div>

  <div id="post-container">
    <h1 id="post-title"></h1>
    <p class="meta">
      By <span id="post-author"></span> on <span id="post-date"></span>
    </p>
    <div id="post-content" class="post-content"></div>
  </div>

  <div class="text-center mt-4" style="color: #888;">
    <a href="/" style="color: #888; text-decoration: none; display: inline-flex; align-items: center; gap: 2px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="vertical-align: middle;">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
      </svg>
      de volta ao início
    </a>
  </div>

  <div id="comments-section" class="mt-4" style="display: none;">
    <h2 class="mb-4">Comentários</h2>
    <div id="comments-list">

    </div>
    <div class="mt-4 pt-4 border-top">
      <form id="comment-form" style="display: none;">
          <h4>Deixe um comentário</h4>
          <div class="mb-3">
              <textarea id="comment-content" class="form-control" rows="4" placeholder="Escreva seu comentário..." required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Postar comentário</button>
          <div id="comment-error" class="text-danger mt-2"></div>
      </form>
      
      <div id="login-prompt" style="display: none;">
          <p class="text-center">Por favor, <a href="/login">entre</a> ou <a href="/register">crie uma conta</a> para postar um comentário.</p>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const postId = document.body.dataset.postId;
      const token = localStorage.getItem('token');
      const apiBaseUrl = `http://localhost:8080/api/v1`;

      const postContainer = document.getElementById('post-container');
      const commentsSection = document.getElementById('comments-section');
      const loadingState = document.getElementById('loading-state');
      const errorState = document.getElementById('error-state');

      const userIconSvg = `
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>`;

      if (!postId || postId === '0') {
        showError('<h2>Invalid Post ID</h2>');
        return;
      }

      function showError(message) {
        loadingState.style.display = 'none';
        errorState.innerHTML = message;
        errorState.style.display = 'block';
        document.title = 'Error';
      }

      function fetchPostAndComments() {
        const headers = { 'Content-Type': 'application/json' };
        if (token) {
          headers['Authorization'] = `Bearer ${token}`;
        }

        fetch(`${apiBaseUrl}/posts/${postId}`, { method: 'GET', headers })
          .then((response) => {
            if (!response.ok) throw response;
            return response.json();
          })
          .then((post) => {
            renderPost(post);
            fetchAndRenderComments();
            setupCommentForm();
          })
          .catch(async (err) => {
            let errorMessage = `<h2>Error</h2><p>Could not load the post.</p>`;
            if (err.status) {
              if (err.status === 404) errorMessage = `<h2>Post Not Found</h2>`;
              else if (err.status === 403)
                errorMessage = `<h2>Access Denied</h2><p>This post is private.</p>`;
            }
            showError(errorMessage);
            console.error('Failed to fetch post:', err);
          });
      }

      function renderPost(post) {
        document.title = post.title;
        document.getElementById('post-title').textContent = post.title;
        document.getElementById('post-author').textContent = post.author_name;
        document.getElementById('post-date').textContent = new Date(
          post.created_at
        ).toLocaleDateString('en-US', {
          year: 'numeric',
          month: 'long',
          day: 'numeric',
        });

        const htmlContent = marked.parse(post.content || '');
        const postContentDiv = document.getElementById('post-content');
        postContentDiv.innerHTML = htmlContent;

        postContentDiv.querySelectorAll('pre code').forEach((block) => {
          hljs.highlightElement(block);
        });

        loadingState.style.display = 'none';
        postContainer.style.display = 'block';
      }

      function fetchAndRenderComments() {
        fetch(`${apiBaseUrl}/comments?post_id=${postId}`)
          .then((res) => res.json())
          .then((comments) => {
            const commentsList = document.getElementById('comments-list');
            commentsList.innerHTML = '';
            if (comments.length > 0) {
              comments.forEach((comment) => {
                const commentElement = createCommentElement(comment);
                commentsList.appendChild(commentElement);
              });
            } else {
              commentsList.innerHTML =
                '<p id="no-comments-msg" class="text-center text-muted">Nenhum comentário ainda, seja o primeiro a comentar!</p>';
            }
            commentsSection.style.display = 'block';
          })
          .catch((err) => console.error('Failed to load comments:', err));
      }

      function createCommentElement(comment) {
        const div = document.createElement('div');
        div.className = 'comment';
      
        const formattedDate = new Date(comment.created_at).toLocaleString('en-US', {
          dateStyle: 'medium',
          timeStyle: 'short',
        });
      
        // Se o comentário trouxer profile_image_url, monta o <img>, senão usa o SVG
        const avatarHtml = comment.author_profile_image_url
          ? `<img src="${comment.author_profile_image_url}" alt="Avatar">`
          : userIconSvg;
      
        div.innerHTML = `
          <div class="comment-avatar">${avatarHtml}</div>
          <div class="comment-body">
            <div class="comment-header">
              <span class="comment-author">${comment.author_name}</span>
              <span class="comment-date">${formattedDate}</span>
            </div>
            <p class="comment-text">${document.createTextNode(comment.content).textContent}</p>
          </div>
        `;
        return div;
      }
      
      function setupCommentForm() {
        const commentForm = document.getElementById('comment-form');
        const loginPrompt = document.getElementById('login-prompt');

        if (token) {
          loginPrompt.style.display = 'none';
          commentForm.style.display = 'block';

          commentForm.addEventListener('submit', handleCommentSubmit);
        } else {
          commentForm.style.display = 'none';
          loginPrompt.style.display = 'block';
        }
      }

      function handleCommentSubmit(event) {
        event.preventDefault();
        const contentTextarea = document.getElementById('comment-content');
        const content = contentTextarea.value.trim();
        const errorDiv = document.getElementById('comment-error');
        errorDiv.textContent = '';

        if (!content) {
          errorDiv.textContent = 'Comentário não pode ser vazio.';
          return;
        }

        const submitButton = event.target.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.textContent = 'Enviando...';

        fetch(`${apiBaseUrl}/comments`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            Authorization: `Bearer ${token}`,
          },
          body: JSON.stringify({
            post_id: parseInt(postId, 10),
            content: content,
          }),
        })
          .then((response) => {
            if (!response.ok) {
              return response
                .json()
                .then((err) => {
                  throw new Error(err.error || 'Failed to post comment');
                });
            }
            return response.json();
          })
          .then((newComment) => {
            const commentsList = document.getElementById('comments-list');
            const noCommentsMsg = document.getElementById('no-comments-msg');
            if (noCommentsMsg) noCommentsMsg.remove();

            const commentElement = createCommentElement(newComment);
            commentsList.appendChild(commentElement);
            contentTextarea.value = '';
            errorDiv.textContent = '';
          })
          .catch((err) => {
            errorDiv.textContent = err.message;
          })
          .finally(() => {
            submitButton.disabled = false;
            submitButton.textContent = 'Postar comentário';
          });
      }

      fetchPostAndComments();
    });
  </script>
</body>
</html>