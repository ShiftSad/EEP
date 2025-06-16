(function () {
  function parseJwt(t) {
    if (!t) return {};
    const b64 = t.split('.')[1].replace(/-/g, '+').replace(/_/g, '/');
    const json = decodeURIComponent(
      atob(b64)
        .split('')
        .map((c) => '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2))
        .join('')
    );
    return JSON.parse(json);
  }

  function buildDefault(label, href, name) {
    return `
<nav class="navbar navbar-expand-lg shadow-sm"
     style="background-color:rgb(226,200,252);">
  <div class="container">
    <a class="navbar-brand" href="/">Meu Blog</a>
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="${href}">${label}</a>
        </li>
        <li class="nav-item">
          <span class="nav-link" id="profileName">${name}</span>
        </li>
      </ul>
    </div>
  </div>
</nav>`;
  }

  function buildHome(name) {
    return `
<nav class="navbar sticky-top shadow-sm px-3"
     style="background-color:rgb(226,200,252);">
  <div class="container-fluid flex-wrap gap-2">
    <input type="search" id="searchInput" class="form-control w-auto"
           placeholder="Procurar posts...">
    <button id="toggleSidebar" class="btn btn-secondary me-2"
            style="background-color:#5b2a91;border-color:#4b206e;color:white;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
           fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2
                 a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474
                 l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1
                 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306
                 l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
      </svg>
    </button>
    <button id="searchBtn" class="btn btn-secondary"
            style="background-color:#5b2a91;border-color:#4b206e;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
           fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.397l3.85 3.85
                 a1 1 0 0 0 1.414-1.414l-3.85-3.85zM12 6.5a5.5 5.5 0 1
                 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg>
    </button>
    <a class="ms-auto nav-link" href="/dashboard">Dashboard</a>
    <div class="d-flex align-items-center me-3"
         style="cursor:pointer" onclick="window.location.href='/profile'">
      <span id="profileName" class="fw-medium pe-2">${name}</span>
      <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
           viewBox="0 0 8 8" class="me-2">
        <path d="m4 0c-1.1 0-2 1.12-2 2.5s.9 2.5 2 2.5
                 2-1.12 2-2.5-.9-2.5-2-2.5zm-2.09 5
                 c-1.06.05-1.91.92-1.91 2v1h8v-1
                 c0-1.08-.84-1.95-1.91-2-.54.61-1.28
                 1-2.09 1s-1.55-.39-2.09-1z"/>
      </svg>
    </div>
  </div>
</nav>`;
  }

  function init() {
    const el = document.querySelector('[data-navbar-type]');
    if (!el) return;
    const type = el.dataset.navbarType;
    const label = el.dataset.linkLabel || 'Home';
    const href = el.dataset.linkHref || '/';
    const token = localStorage.getItem('token') || '';
    const user = parseJwt(token);
    const name = user.name || 'Visitante';
    el.outerHTML =
      type === 'home' ? buildHome(name) : buildDefault(label, href, name);
  }

  document.addEventListener('DOMContentLoaded', init);
})();