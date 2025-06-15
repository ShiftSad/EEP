<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
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
  </style>
</head>
<body>
  <nav class="navbar bg-body-tertiary sticky-top shadow-sm px-3">
    <div class="container-fluid flex-wrap gap-2">
      <input type="search" id="searchInput" class="form-control w-auto" placeholder="Procurar posts...">

      <select id="tagFilter" class="form-select w-auto">
        <option value="">Todas Tags</option>
      </select>

      <button id="addPostBtn" class="btn btn-primary ms-auto">
        + Adicionar post
      </button>
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
    const listEl = document.getElementById('blogList');
    const tagEl = document.getElementById('tagFilter');
    const loadMoreBtn = document.getElementById('loadMoreBtn')

    let currentIndex = 0
    const limit = 20
    fetchPosts(currentIndex, limit, false);

    loadMoreBtn.addEventListener('click', () => {
      fetchPosts(currentIndex, limit, true)
    })

    function fetchPosts(index, limit, append = false) {
      fetch(`${apiUrl}?index=${index}&limit=${limit}`)
        .then((res) => {
          if (!res.ok) throw new Error('Erro ao buscar posts')
          return res.json()
        })
        .then((data) => {
          const posts = data.map((item) => {
            const content = item.content
              .replace(/[^\p{L}\p{N}\s]/gu, '')
              .split(/\s+/)
              .slice(0, 20)
              .join(' ');
            return {
              id: item.id,
              title: item.title,
              content: content,
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

          // se não for append, limpa lista e reconstrói filtro de tags
          if (!append) {
            listEl.innerHTML = ''
            buildTagOptions(posts)
            currentIndex = 0
          }

          const html = posts.map(buildCard).join('')
          if (append) listEl.insertAdjacentHTML('beforeend', html)
          else listEl.innerHTML = html

          currentIndex += posts.length
          if (posts.length < limit) {
            loadMoreBtn.style.display = 'none'
          }
        })
        .catch((err) => {
          listEl.innerHTML = `<div class="alert alert-danger">
            ${err.message}
          </div>`
        })
    }

    function buildTagOptions(posts) {
      const tags = new Set(posts.flatMap((p) => p.tags));
      tagEl.innerHTML =
        '<option value="">Todas Tags</option>' +
        [...tags]
          .sort()
          .map((t) => `<option value="${t}">${t}</option>`)
          .join('');
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
        ? `
            <div class="ratio ratio-16x9">
              <img
                src="${p.image}"
                class="card-img-top object-fit-cover"
                alt="${p.title}"
              />
            </div>`
        : '';

      const tagBadges = p.tags
        .map((t) => {
          const colors = getTagColor(t);
          return `<span class="tag-badge" style="--tag-color: ${colors.base}; --tag-color-dark: ${colors.dark}">${t}</span>`;
        })
        .join('');

      return `
        <div class="col-md-6 col-lg-4 mb-4">
          <article class="card h-100 shadow-sm">
            ${imgBlock}
            <div class="card-body d-flex flex-column">
              <h5 class="card-title mb-2">${p.title}</h5>
              <p class="card-text text-muted mb-3 flex-grow-1">${p.content}</p>
              <div class="mb-3">
                ${tagBadges}
              </div>
              <a
                href="${p.url}"
                class="btn btn-outline-primary"
              >
                Continuar lendo
              </a>
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
        undefined,
        { year: 'numeric', month: 'short', day: 'numeric' }
      );
    }
  </script>
</body>
</html>