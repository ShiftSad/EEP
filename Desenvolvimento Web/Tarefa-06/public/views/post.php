<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading Post...</title>
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <style>
    body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
    #post-container { display: none; /* Escondido até tudo ser carregado */ }
    #loading-state { text-align: center; color: #888; }
    #error-state { text-align: center; color: #d9534f; }
    h1 { color: #111; }
    .meta { color: #666; font-size: 0.9em; border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 1rem; }
    .post-content img { max-width: 100%; height: auto; }
    .post-content pre { background-color: #f4f4f4; padding: 1rem; border-radius: 5px; white-space: pre-wrap; }
    .post-content code { font-family: "Courier New", Courier, monospace; }
  </style>
</head>
<body data-post-id="<?php echo $post_id; ?>">

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

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const postContainer = document.getElementById('post-container');
      const loadingState = document.getElementById('loading-state');
      const errorState = document.getElementById('error-state');

      const postId = document.body.dataset.postId;

      if (!postId || postId === '0') {
        loadingState.style.display = 'none';
        errorState.innerHTML = '<h2>Invalid Post ID</h2>';
        errorState.style.display = 'block';
        document.title = 'Error';
        return;
      }

      const token = localStorage.getItem('token');
      const apiUrl = `http://localhost:8080/api/v1/posts/${postId}`;

      const headers = {
        'Content-Type': 'application/json',
      };

      if (token) {
        headers['Authorization'] = `Bearer ${token}`;
      }

      fetch(apiUrl, {
        method: 'GET',
        headers: headers,
      })
      .then(response => {
        if (!response.ok) {
          throw { status: response.status, statusText: response.statusText };
        }
        return response.json();
      })
      .then(post => {
        document.title = post.title;
        document.getElementById('post-title').textContent = post.title;
        document.getElementById('post-author').textContent = post.author_name;
        const postDate = new Date(post.created_at).toLocaleDateString('en-US', {
          year: 'numeric', month: 'long', day: 'numeric'
        });
        document.getElementById('post-date').textContent = postDate;

        const htmlContent = marked.parse(post.content);
        document.getElementById('post-content').innerHTML = htmlContent;

        loadingState.style.display = 'none';
        postContainer.style.display = 'block';
      })
      .catch(err => {
        loadingState.style.display = 'none';
        let errorMessage = `<h2>Error</h2><p>Could not load the post.</p>`;
        if (err.status === 404) {
          errorMessage = `<h2>Post Not Found</h2><p>The post you are looking for does not exist.</p>`;
          document.title = 'Post Not Found';
        } else if (err.status === 403) {
          errorMessage = `<h2>Access Denied</h2><p>This post is private and you do not have permission to view it.</p>`;
          document.title = 'Access Denied';
        }
        errorState.innerHTML = errorMessage;
        errorState.style.display = 'block';
        console.error('Failed to fetch post:', err);
      });
    });
  </script>

</body>
</html>