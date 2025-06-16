<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard de Postagens</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <style>
      body {
        background: rgb(238, 227, 248);
      }
      .navbar {
        background-color: rgb(226, 200, 252) !important;
      }
      .table-hover tbody tr:hover {
        background-color: #e9ecef;
        cursor: pointer;
      }
      .btn-action {
        margin-right: 5px;
      }
      .loading-spinner {
        display: none;
      }
      .btn-primary {
        background-color: #5b2a91;
        border-color: #4b206e;
      }
      .btn-primary:hover {
        background-color: #4b206e;
        border-color: #3a1855;
      }
      .btn-outline-primary {
        color: #5b2a91;
        border-color: #5b2a91;
      }
      .btn-outline-primary:hover {
        background-color: #5b2a91;
        border-color: #5b2a91;
      }
      .text-primary {
        color: #5b2a91 !important;
      }
      .navbar-brand {
        color: #5b2a91 !important;
        font-weight: 600;
      }
      .nav-link {
        color: #5b2a91 !important;
      }
      .card {
        box-shadow: 0 2px 10px rgba(91, 42, 145, 0.1);
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/">Meu Blog</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <span class="nav-link" id="profileName"></span>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container py-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2" style="color: #5b2a91">Dashboard de Postagens</h1>
        <button id="addPostBtn" class="btn btn-primary">
          + Adicionar Nova Postagem
        </button>
      </div>

      <div class="card shadow-sm">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Título</th>
                  <th>Data de Criação</th>
                  <th>Visibilidade</th>
                  <th class="text-end">Ações</th>
                </tr>
              </thead>
              <tbody id="postsTableBody"></tbody>
            </table>
          </div>
          <div id="loadingSpinner" class="text-center p-4">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Carregando...</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="postModal"
      tabindex="-1"
      aria-labelledby="postModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(226, 200, 252)">
            <h5 class="modal-title" id="postModalLabel" style="color: #5b2a91">
              Nova Postagem
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form id="postForm">
              <input type="hidden" id="postId" />
              <div class="mb-3">
                <label for="postTitle" class="form-label">Título</label>
                <input type="text" class="form-control" id="postTitle" required />
              </div>
              <div class="mb-3">
                <label for="postDescription" class="form-label">Descrição (curta)</label>
                <textarea class="form-control" id="postDescription" rows="2"></textarea>
              </div>
              <div class="mb-3">
                <label for="postContent" class="form-label">Conteúdo Completo</label>
                <textarea class="form-control" id="postContent" rows="8" required></textarea>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="postLocation" class="form-label"
                    >Local do Evento (opcional)</label
                  >
                  <input type="text" class="form-control" id="postLocation" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="postEventDateTime" class="form-label"
                    >Data e Hora do Evento (opcional)</label
                  >
                  <input type="datetime-local" class="form-control" id="postEventDateTime" />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Imagem da Postagem</label>
                <div class="card p-2">
                  <div class="row align-items-center g-3">
                    <div class="col-md-4 text-center">
                      <img
                        id="imagePreview"
                        src=""
                        class="img-fluid rounded"
                        alt="Pré-visualização da imagem"
                        style="display: none; max-height: 150px; object-fit: cover"
                      />
                    </div>
                    <div class="col-md-8">
                      <div class="mb-2">
                        <label for="postImageFile" class="form-label small"
                          >Fazer upload de nova imagem:</label
                        >
                        <input
                          class="form-control form-control-sm"
                          type="file"
                          id="postImageFile"
                          accept="image/png, image/jpeg, image/gif, image/webp"
                        />
                        <div id="uploadStatus" class="form-text mt-1"></div>
                      </div>
                      <hr />
                      <div class="mb-1">
                        <label for="postImageUrl" class="form-label small"
                          >Ou usar URL existente:</label
                        >
                        <input
                          type="url"
                          class="form-control form-control-sm"
                          id="postImageUrl"
                          placeholder="Cole uma URL ou faça o upload"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="postTags" class="form-label">Tags (separadas por vírgula)</label>
                <input
                  type="text"
                  class="form-control"
                  id="postTags"
                  placeholder="tecnologia, evento, php"
                />
              </div>
              <div class="mb-3">
                <label for="postVisibility" class="form-label">Visibilidade</label>
                <select class="form-select" id="postVisibility">
                  <option value="public">Público</option>
                  <option value="private">Privado</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cancelar
            </button>
            <button type="button" id="savePostBtn" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      const apiUrl = 'http://localhost:8080/api/v1/posts';
      const imageUrl = 'http://localhost:8080/api/v1/images';
      const token = localStorage.getItem('token');

      const postsTableBody = document.getElementById('postsTableBody');
      const loadingSpinner = document.getElementById('loadingSpinner');
      const addPostBtn = document.getElementById('addPostBtn');
      const savePostBtn = document.getElementById('savePostBtn');
      const postModal = new bootstrap.Modal(document.getElementById('postModal'));
      const postForm = document.getElementById('postForm');
      const profileNameEl = document.getElementById('profileName');
      const postImageFile = document.getElementById('postImageFile');

      let currentUser = null;

      document.addEventListener('DOMContentLoaded', () => {
        if (!token) {
          alert('Acesso negado. Por favor, faça o login.');
          window.location.href = '/login';
          return;
        }

        try {
          currentUser = parseJwt(token);
          profileNameEl.textContent = `Olá, ${currentUser.name}`;
          fetchPosts();
        } catch (error) {
          localStorage.removeItem('token');
          alert('Sua sessão expirou. Por favor, faça o login novamente.');
          window.location.href = '/login';
        }
      });

      postImageFile.addEventListener('change', handleImageUpload);

      async function handleImageUpload(event) {
        const file = event.target.files[0];
        if (!file) return;

        const uploadStatus = document.getElementById('uploadStatus');
        const imageUrlInput = document.getElementById('postImageUrl');
        const imagePreview = document.getElementById('imagePreview');

        uploadStatus.textContent = 'Enviando...';
        uploadStatus.className = 'form-text text-primary';

        const formData = new FormData();
        formData.append('image', file);

        try {
          const response = await fetch(imageUrl, {
            method: 'POST',
            headers: {
              Authorization: `Bearer ${token}`,
            },
            body: formData,
          });

          const result = await response.json();

          if (!response.ok) {
            throw new Error(result.error || 'Falha no upload.');
          }

          imageUrlInput.value = result.url;
          imagePreview.src = result.url;
          imagePreview.style.display = 'block';
          uploadStatus.textContent = 'Upload concluído com sucesso!';
          uploadStatus.className = 'form-text text-success';
        } catch (error) {
          uploadStatus.textContent = `Erro: ${error.message}`;
          uploadStatus.className = 'form-text text-danger';
        }
      }

      async function fetchPosts() {
        showLoading(true);
        try {
          const response = await fetch(apiUrl, {
            headers: { Authorization: `Bearer ${token}` },
          });
          if (!response.ok) throw new Error('Falha ao buscar postagens.');

          const posts = await response.json();
          renderPosts(posts);
        } catch (error) {
          postsTableBody.innerHTML = `<tr><td colspan="4" class="text-center text-danger">${error.message}</td></tr>`;
        } finally {
          showLoading(false);
        }
      }

      async function savePost() {
        const postId = document.getElementById('postId').value;
        const postData = {
          title: document.getElementById('postTitle').value,
          description: document.getElementById('postDescription').value,
          content: document.getElementById('postContent').value,
          location: document.getElementById('postLocation').value || null,
          event_datetime: document.getElementById('postEventDateTime').value
            ? new Date(document.getElementById('postEventDateTime').value)
                .toISOString()
                .slice(0, 19)
                .replace('T', ' ')
            : null,
          image_url: document.getElementById('postImageUrl').value || null,
          visibility: document.getElementById('postVisibility').value,
          tags: document
            .getElementById('postTags')
            .value.split(',')
            .map((tag) => tag.trim())
            .filter(Boolean),
        };

        const isUpdating = !!postId;
        const url = isUpdating ? `${apiUrl}/${postId}` : apiUrl;
        const method = isUpdating ? 'PUT' : 'POST';

        try {
          const response = await fetch(url, {
            method: method,
            headers: {
              'Content-Type': 'application/json',
              Authorization: `Bearer ${token}`,
            },
            body: JSON.stringify(postData),
          });

          if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error || `Falha ao salvar a postagem.`);
          }

          postModal.hide();
          fetchPosts();
        } catch (error) {
          alert(`Erro: ${error.message}`);
        }
      }

      async function deletePost(postId) {
        if (!confirm('Tem certeza que deseja excluir esta postagem? Esta ação não pode ser desfeita.')) {
          return;
        }

        try {
          const response = await fetch(`${apiUrl}/${postId}`, {
            method: 'DELETE',
            headers: { Authorization: `Bearer ${token}` },
          });

          if (response.status === 204) {
            fetchPosts();
          } else {
            const errorData = await response.json();
            throw new Error(errorData.error || 'Falha ao excluir a postagem.');
          }
        } catch (error) {
          alert(`Erro: ${error.message}`);
        }
      }

      function renderPosts(posts) {
        if (posts.length === 0) {
          postsTableBody.innerHTML = `<tr><td colspan="4" class="text-center">Nenhuma postagem encontrada.</td></tr>`;
          return;
        }

        postsTableBody.innerHTML = posts
          .map(
            (post) => `
<tr>
<td>${escapeHtml(post.title)}</td>
<td>${fmtDate(post.created_at)}</td>
<td>
<span class="badge ${post.visibility === 'public' ? 'bg-success' : 'bg-secondary'}">
${post.visibility}
</span>
</td>
<td class="text-end">
<button class="btn btn-sm btn-outline-secondary btn-action edit-btn" data-id="${
              post.id
            }">Editar</button>
<button class="btn btn-sm btn-outline-danger btn-action delete-btn" data-id="${
              post.id
            }">Excluir</button>
</td>
</tr>
`
          )
          .join('');
      }

      addPostBtn.addEventListener('click', () => {
        postForm.reset();
        document.getElementById('postId').value = '';
        document.getElementById('postModalLabel').textContent = 'Nova Postagem';
        document.getElementById('imagePreview').style.display = 'none';
        document.getElementById('imagePreview').src = '';
        document.getElementById('uploadStatus').textContent = '';
        document.getElementById('postImageFile').value = '';
        postModal.show();
      });

      savePostBtn.addEventListener('click', savePost);

      postsTableBody.addEventListener('click', async (e) => {
        const target = e.target;
        const postId = target.dataset.id;

        if (target.classList.contains('edit-btn')) {
          try {
            const response = await fetch(`${apiUrl}/${postId}`, {
              headers: { Authorization: `Bearer ${token}` },
            });
            if (!response.ok) throw new Error('Não foi possível carregar os dados da postagem.');
            const post = await response.json();

            document.getElementById('postId').value = post.id;
            document.getElementById('postTitle').value = post.title;
            document.getElementById('postDescription').value = post.description || '';
            document.getElementById('postContent').value = post.content;
            document.getElementById('postLocation').value = post.location || '';
            document.getElementById('postEventDateTime').value = post.event_datetime
              ? post.event_datetime.slice(0, 16)
              : '';
            document.getElementById('postImageUrl').value = post.image_url || '';
            document.getElementById('postTags').value = (post.tags || []).join(', ');
            document.getElementById('postVisibility').value = post.visibility;

            const imagePreview = document.getElementById('imagePreview');
            if (post.image_url) {
              imagePreview.src = post.image_url;
              imagePreview.style.display = 'block';
            } else {
              imagePreview.style.display = 'none';
              imagePreview.src = '';
            }
            document.getElementById('uploadStatus').textContent = '';
            document.getElementById('postImageFile').value = '';

            document.getElementById('postModalLabel').textContent = 'Editar Postagem';
            postModal.show();
          } catch (error) {
            alert(error.message);
          }
        }

        if (target.classList.contains('delete-btn')) {
          deletePost(postId);
        }
      });

      function showLoading(isLoading) {
        loadingSpinner.style.display = isLoading ? 'block' : 'none';
        if (isLoading) {
          postsTableBody.innerHTML = '';
        }
      }

      function parseJwt(token) {
        const base64Url = token.split('.')[1];
        const base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        const jsonPayload = decodeURIComponent(
          atob(base64)
            .split('')
            .map((c) => '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2))
            .join('')
        );
        return JSON.parse(jsonPayload);
      }

      function fmtDate(iso) {
        return new Date(iso).toLocaleDateString('pt-BR', {
          day: '2-digit',
          month: '2-digit',
          year: 'numeric',
        });
      }

      function escapeHtml(unsafe) {
        return unsafe
          .replace(/&/g, '&amp;')
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;')
          .replace(/"/g, '&quot;')
          .replace(/'/g, '&#039;');
      }
    </script>
  </body>
</html>