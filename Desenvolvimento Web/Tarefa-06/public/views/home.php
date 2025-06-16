<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <style>
    .tag-badge {
      background: linear-gradient(135deg, var(--tag-color), var(--tag-color-dark));
      color: white;
      padding: 0.35rem 0.65rem;
      border-radius: 1rem;
      font-size: 0.75rem;
      font-weight: 500;
      text-decoration: none;
      display: inline-block;
      margin: 0.125rem 0.25rem 0.125rem 0;
      box-shadow: 0 1px 3px rgba(0,0,0,0.12);
      transition: all 0.2s ease;
      cursor: pointer;
    }
    .tag-badge:hover {
      transform: translateY(-1px);
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      filter: brightness(1.1);
    }
    .filter-tag {
      background: #f8f9fa;
      color: #495057;
      border: 1px solid #dee2e6;
      padding: 0.25rem 0.5rem;
      border-radius: 0.5rem;
      font-size: 0.75rem;
      margin: 0.125rem;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .filter-tag:hover {
      background: #e9ecef;
    }
    .filter-tag.active {
      background: #5b2a91;
      color: white;
      border-color: #4b206e;
    }
    body {
      background:rgb(238, 227, 248);
    }
    .sidebar {
      position: fixed;
      top: 0;
      left: -320px;
      width: 300px;
      height: 100vh;
      background: white;
      box-shadow: 2px 0 10px rgba(0,0,0,0.1);
      transition: left 0.3s ease;
      z-index: 1050;
      padding: 1rem;
      overflow-y: auto;
    }
    .sidebar.show {
      left: 0;
    }
    .sidebar-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0,0,0,0.5);
      z-index: 1040;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }
    .sidebar-overlay.show {
      opacity: 1;
      visibility: visible;
    }
    .sidebar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
      padding-bottom: 0.5rem;
      border-bottom: 1px solid #dee2e6;
    }
    .sidebar-close {
      background: none;
      border: none;
      font-size: 1.5rem;
      color: #6c757d;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="sidebar-overlay" id="sidebarOverlay"></div>
  <div class="sidebar" id="tagSidebar">
    <div class="sidebar-header">
      <h6 class="mb-0" style="color: #5b2a91;">Filtrar por Tags</h6>
      <button class="sidebar-close" id="closeSidebar">×</button>
    </div>
    <div id="tagFilter" class="d-flex flex-wrap"></div>
    <div class="mt-3">
      <button id="clearTags" class="btn btn-sm btn-outline-secondary w-100">
        Limpar filtros
      </button>
    </div>
  </div>
  <nav class="navbar sticky-top shadow-sm px-3" style="background-color:rgb(226, 200, 252);">
    <div class="container-fluid flex-wrap gap-2">
      <input type="search" id="searchInput" class="form-control w-auto" placeholder="Procurar posts...">
      <button id="toggleSidebar" class="btn btn-secondary me-2" style="background-color: #5b2a91; border-color: #4b206e; color: white;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
          <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
        </svg>
      </button>
      <button id="searchBtn" class="btn btn-secondary" style="background-color: #5b2a91; border-color: #4b206e;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.397l3.85 3.85a1 1 0 0 0 1.414-1.414l-3.85-3.85zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </button>
      <a id="addPostBtn" class="ms-auto nav-link" href="/dashboard">
        Dashboard
      </a>
      <div class="d-flex align-items-center me-3">
        <span id="profileName" class="fw-medium pe-2">Visitante</span>
        <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 8 8" width="16" class="me-2">
          <path d="m4 0c-1.1 0-2 1.12-2 2.5s.9 2.5 2 2.5 2-1.12 2-2.5-.9-2.5-2-2.5zm-2.09 5c-1.06.05-1.91.92-1.91 2v1h8v-1c0-1.08-.84-1.95-1.91-2-.54.61-1.28 1-2.09 1s-1.55-.39-2.09-1z"/>
        </svg>
      </div>
    </div>
  </nav>
  <div class="container py-4">
    <div id="blogList" class="row"></div>
    <div id="loadMoreWrapper" class="text-center my-4">
      <button id="loadMoreBtn" class="btn btn-secondary">
        Carregar mais
      </button>
    </div>
  </div>
  <script>
    const apiUrl = 'http://localhost:8080/api/v1/posts';
    const tagsUrl = 'http://localhost:8080/api/v1/tags';
    const listEl = document.getElementById('blogList');
    const tagEl = document.getElementById('tagFilter');
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    const searchButton = document.getElementById('searchBtn');
    const searchInput = document.getElementById('searchInput');
    const clearTagsBtn = document.getElementById('clearTags');
    const toggleSidebarBtn = document.getElementById('toggleSidebar');
    const closeSidebarBtn = document.getElementById('closeSidebar');
    const sidebarEl = document.getElementById('tagSidebar');
    const overlayEl = document.getElementById('sidebarOverlay');

    const token = localStorage.getItem('token');

    let currentIndex = 0;
    const limit = 20;
    let selectedTags = [];
    let searchedTerm = '';
    let allTags = [];

    fetchTags();
    fetchPosts(currentIndex, limit, false, searchedTerm, []);
    updateProfile();

    loadMoreBtn.addEventListener('click', () => {
      fetchPosts(currentIndex, limit, true, searchedTerm, selectedTags);
    });

    searchButton.addEventListener('click', () => {
      searchedTerm = searchInput.value.trim();
      listEl.innerHTML = '';
      fetchPosts(0, limit, false, searchedTerm, selectedTags);
      currentIndex = 0;
    });

    toggleSidebarBtn.addEventListener('click', () => {
      sidebarEl.classList.add('show');
      overlayEl.classList.add('show');
    });

    closeSidebarBtn.addEventListener('click', closeSidebar);
    overlayEl.addEventListener('click', closeSidebar);

    clearTagsBtn.addEventListener('click', () => {
      selectedTags = [];
      updateTagFilters();
      fetchPosts(0, limit, false, searchedTerm, selectedTags);
      currentIndex = 0;
      closeSidebar();
    });

    function closeSidebar() {
      sidebarEl.classList.remove('show');
      overlayEl.classList.remove('show');
    }

    function fetchTags() {
      fetch(tagsUrl)
        .then(res => {
          if (!res.ok) throw new Error('Erro ao buscar tags');
          return res.json();
        })
        .then(data => {
          allTags = data
            .map(t => ({
              tag: t.tag,
              usage_count: parseInt(t.usage_count, 10)
            }))
            .sort((a, b) => b.usage_count - a.usage_count);
          buildTagOptions();
        })
        .catch(() => {
          tagEl.innerHTML = '<div class="text-danger">Erro ao carregar tags</div>';
        });
    }

    function fetchPosts(index, limit, append = false, filter = '', tags = []) {
      let url = `${apiUrl}?index=${index}&limit=${limit}`;
      if (filter) url += `&filter=${encodeURIComponent(filter)}`;
      if (tags.length > 0) url += `&tags=${encodeURIComponent(tags.join(','))}`;
      
      fetch(url)
        .then((res) => {
          if (!res.ok) throw new Error('Erro ao buscar posts');
          return res.json();
        })
        .then((data) => {
          const posts = data.map((item) => {
            return {
              id: item.id,
              title: item.title,
              description: item.description,
              content: item.content,
              location: item.location,
              event_datetime: item.event_datetime,
              image: item.image_url,
              url: `/posts/${item.id}`,
              tags: item.tags || [],
              date: item.created_at,
              readTime: Math.max(
                1,
                Math.round((item.content.split(/\s+/).length || 0) / 80)
              )
            };
          });

          if (!append) {
            listEl.innerHTML = '';
            currentIndex = 0;
          }

          const html = posts.map(buildCard).join('');
          if (append) listEl.insertAdjacentHTML('beforeend', html);
          else listEl.innerHTML = html;

          currentIndex += posts.length;
          if (posts.length < limit) loadMoreBtn.style.display = 'none';
          else loadMoreBtn.style.display = '';
        })
        .catch((err) => {
          listEl.innerHTML = `<div class="alert alert-danger">
            ${err.message}
          </div>`;
        });
    }

    function buildTagOptions() {
      const tagButtons = allTags
        .map(({ tag }) => {
          const isActive = selectedTags.includes(tag);
          return `<span class="filter-tag ${isActive ? 'active' : ''}" data-tag="${tag}">${tag}</span>`;
        })
        .join('');
      tagEl.innerHTML = tagButtons;

      tagEl.onclick = null;
      tagEl.onclick = (e) => {
        if (e.target.classList.contains('filter-tag')) {
          const tag = e.target.dataset.tag;
          if (selectedTags.includes(tag)) selectedTags = selectedTags.filter(t => t !== tag);
          else selectedTags.push(tag);
          updateTagFilters();
          fetchPosts(0, limit, false, searchedTerm, selectedTags);
          currentIndex = 0;
        }
      };
      updateTagFilters();
    }

    function updateTagFilters() {
      const filterTags = tagEl.querySelectorAll('.filter-tag');
      filterTags.forEach(tag => {
        const tagName = tag.dataset.tag;
        if (selectedTags.includes(tagName)) tag.classList.add('active');
        else tag.classList.remove('active');
      });
    }

    function getTagColor(tag) {
      const colors = [
        '#6366f1', '#8b5cf6', '#ec4899', '#ef4444', 
        '#f59e0b', '#10b981', '#06b6d4', '#84cc16',
        '#f97316', '#8b5cf6', '#6366f1', '#ec4899'
      ];
      let hash = 0;
      for (let i = 0; i < tag.length; i++) {
        hash = tag.charCodeAt(i) + ((hash << 5) - hash);
      }
      const colorIndex = Math.abs(hash) % colors.length;
      const baseColor = colors[colorIndex];
      const darkColor = baseColor + '88';
      return { base: baseColor, dark: darkColor };
    }

    function buildCard(p) {
      const imgBlock = p.image
        ? `<div class="ratio ratio-16x9"><img src="${p.image}" class="card-img-top object-fit-cover" alt="${p.title}"/></div>`
        : '';
      const tagBadges = p.tags
        .map((t) => {
          const colors = getTagColor(t);
          return `<span class="tag-badge" style="--tag-color: ${colors.base}; --tag-color-dark: ${colors.dark}">${t}</span>`;
        })
        .join('');

      const locationInfo = p.location ? `
        <div class="d-flex align-items-center text-muted small mt-3 mb-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-geo-alt me-2 flex-shrink-0" viewBox="0 0 16 16">
            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg>
          <span>${p.location}</span>
        </div>` : '';

      const eventDateInfo = p.event_datetime ? `
        <div class="d-flex align-items-center text-muted small mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-calendar-event me-2 flex-shrink-0" viewBox="0 0 16 16">
            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
          </svg>
          <span>${fmtDateTime(p.event_datetime)}</span>
        </div>` : '';
        
      return `
        <div class="col-md-6 col-lg-4 mb-4">
          <article class="card h-100 shadow-sm">
            ${imgBlock}
            <div class="card-body d-flex flex-column">
              <h5 class="card-title mb-2">${p.title}</h5>
              <p class="card-text text-muted">${p.description}</p>
              ${locationInfo}
              ${eventDateInfo}
              <div class="mt-auto pt-2">
                <div class="mb-3">
                  ${tagBadges}
                </div>
                <a
                  href="${p.url}"
                  class="btn btn-outline-primary w-100"
                  style="border-color: #4b206e; color: #4b206e;"
                >
                  Saber mais
                </a>
              </div>
            </div>
            <div
              class="card-footer bg-transparent border-0 small text-muted"
            >
              Postado ${fmtDate(p.date)} · ${p.readTime} min
            </div>
          </article>
        </div>`;
    }

    function fmtDate(iso) {
      return new Date(iso).toLocaleDateString(
        'pt-BR',
        { year: 'numeric', month: 'short', day: 'numeric' }
      );
    }
    
    function fmtDateTime(iso) {
      if (!iso) return '';
      return new Date(iso).toLocaleString('pt-BR', {
        year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit'
      });
    }

    function parseJwt(token) {
      const base64Url = token.split('.')[1];
      const base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
      const jsonPayload = decodeURIComponent(
        atob(base64)
          .split('')
          .map(c => '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2))
          .join('')
      );
      return JSON.parse(jsonPayload);
    }

    function updateProfile() {
      const profileName = document.getElementById('profileName');
      if (token) {
        const user = parseJwt(token);
        profileName.textContent = user.name || 'Usuário';
      } else profileName.textContent = 'Visitante';
    }
  </script>
</body>
</html>