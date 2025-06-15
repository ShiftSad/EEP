<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading Post...</title>
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
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