<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Perfil</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/assets/css/theme.css" />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script defer src="/assets/js/navbar.js"></script>
    <style>
      .profile-avatar-preview {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #e9ecef;
      }
    </style>
  </head>
  <body>
    <div data-navbar-type="default" data-link-label="Dashboard" data-link-href="/dashboard"></div>
    <div class="container py-5">
      <h1 class="h2 mb-4" style="color: #5b2a91">Editar Perfil</h1>
      <div class="card shadow-sm">
        <div class="card-body p-4 p-md-5">
          <div id="alert-container"></div>
          <form id="profileForm">
            <div class="row align-items-center">
              <div class="col-md-4 text-center mb-4 mb-md-0">
                <img
                  id="profileImagePreview"
                  src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22150%22%20height%3D%22150%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%20150%20150%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text/css%22%3E%23holder_18ff24486b1%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C/style%3E%3C/defs%3E%3Cg%20id%3D%22holder_18ff24486b1%22%3E%3Crect%20width%3D%22150%22%20height%3D%22150%22%20fill%3D%22%23777%22%3E%3C/rect%3E%3Cg%3E%3Ctext%20x%3D%2250.4921875%22%20y%3D%2279.5%22%3E150x150%3C/text%3E%3C/g%3E%3C/g%3E%3C/svg%3E"
                  class="profile-avatar-preview"
                  alt="Foto de Perfil"
                />
              </div>
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="userName" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="userName" required />
                </div>
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" id="userEmail" disabled />
                </div>
              </div>
            </div>

            <hr class="my-4" />

            <h5 class="mb-3" style="color: #5b2a91">Foto de Perfil</h5>
            <div class="card p-3" style="background-color: rgb(250, 246, 253)">
              <div class="mb-2">
                <label for="profileImageFile" class="form-label small"
                  >Fazer upload de nova imagem:</label
                >
                <input
                  class="form-control form-control-sm"
                  type="file"
                  id="profileImageFile"
                  accept="image/png, image/jpeg, image/gif, image/webp"
                />
                <div id="uploadStatus" class="form-text mt-1"></div>
              </div>
              <hr />
              <div class="mb-1">
                <label for="profileImageUrl" class="form-label small">Ou usar URL existente:</label>
                <input
                  type="text"
                  class="form-control form-control-sm"
                  id="profileImageUrl"
                  placeholder="Cole a URL da imagem aqui"
                />
              </div>
            </div>

            <hr class="my-4" />

            <h5 class="mb-3" style="color: #5b2a91">Alterar Senha</h5>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="newPassword" class="form-label">Nova Senha</label>
                <input
                  type="password"
                  class="form-control"
                  id="newPassword"
                  placeholder="Deixe em branco para não alterar"
                />
              </div>
              <div class="col-md-6 mb-3">
                <label for="confirmPassword" class="form-label">Confirmar Nova Senha</label>
                <input type="password" class="form-control" id="confirmPassword" />
              </div>
            </div>
            <div class="text-end mt-4">
              <button type="submit" class="btn btn-primary px-4">Salvar Alterações</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      const userApiUrl = 'http://localhost:8080/api/v1/users/me';
      const imageApiUrl = 'http://localhost:8080/api/v1/images';
      const token = localStorage.getItem('token');

      document.addEventListener('DOMContentLoaded', () => {
        if (!token) {
          window.location.href = '/login';
          return;
        }
        loadUserProfile();
      });

      async function loadUserProfile() {
        try {
          const response = await fetch(userApiUrl, {
            headers: { Authorization: `Bearer ${token}` },
          });
          if (!response.ok) throw new Error('Falha ao carregar perfil.');

          const user = await response.json();
          document.getElementById('profileName').textContent = `Olá, ${user.name}`;
          document.getElementById('userName').value = user.name;
          document.getElementById('userEmail').value = user.email;
          if (user.profile_image_url) {
            document.getElementById('profileImagePreview').src = user.profile_image_url;
            document.getElementById('profileImageUrl').value = user.profile_image_url;
          }
        } catch (error) {
          showAlert(error.message, 'danger');
        }
      }

      document.getElementById('profileImageFile').addEventListener('change', async (event) => {
        const file = event.target.files[0];
        if (!file) return;

        const uploadStatus = document.getElementById('uploadStatus');
        uploadStatus.textContent = 'Enviando...';
        uploadStatus.className = 'form-text text-primary';

        const formData = new FormData();
        formData.append('image', file);

        try {
          const response = await fetch(imageApiUrl, {
            method: 'POST',
            headers: { Authorization: `Bearer ${token}` },
            body: formData,
          });
          const result = await response.json();
          if (!response.ok) throw new Error(result.error || 'Falha no upload.');

          document.getElementById('profileImageUrl').value = result.url;
          document.getElementById('profileImagePreview').src = result.url;
          uploadStatus.textContent = 'Upload concluído!';
          uploadStatus.className = 'form-text text-success';
        } catch (error) {
          uploadStatus.textContent = `Erro: ${error.message}`;
          uploadStatus.className = 'form-text text-danger';
        }
      });

      document.getElementById('profileImageUrl').addEventListener('input', (e) => {
        const url = e.target.value;
        const preview = document.getElementById('profileImagePreview');
        if (url) {
          preview.src = url;
        }
      });

      document.getElementById('profileForm').addEventListener('submit', async (event) => {
        event.preventDefault();

        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (newPassword !== confirmPassword) {
          showAlert('As senhas não coincidem.', 'danger');
          return;
        }

        const updateData = {
          name: document.getElementById('userName').value,
          profile_image_url: document.getElementById('profileImageUrl').value || null,
        };

        if (newPassword) {
          updateData.password = newPassword;
        }

        try {
          const response = await fetch(userApiUrl, {
            method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              Authorization: `Bearer ${token}`,
            },
            body: JSON.stringify(updateData),
          });

          const result = await response.json();
          if (!response.ok) throw new Error(result.error || 'Falha ao atualizar o perfil.');

          document.getElementById('profileName').textContent = `Olá, ${result.name}`;
          document.getElementById('newPassword').value = '';
          document.getElementById('confirmPassword').value = '';
          showAlert('Perfil atualizado com sucesso!', 'success');
        } catch (error) {
          showAlert(error.message, 'danger');
        }
      });

      function showAlert(message, type) {
        const alertContainer = document.getElementById('alert-container');
        const alert = `
          <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        `;
        alertContainer.innerHTML = alert;
      }
    </script>
  </body>
</html>