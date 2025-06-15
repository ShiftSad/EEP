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
        <option value="">Todas as Tags</option>
      </select>

      <button id="addPostBtn" class="btn btn-primary ms-auto">
        + Adicionar post
      </button>
    </div>
  </nav>
  <div class="container py-4">
    <div id="blogList" class="row"></div>
  </div>
  <script>
    const temp = [
      {
        title: "AAAAAAAAA",
        content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        image: "https://picsum.photos/800/450?random=1",
        url: "/posts/AAAAAAAAAA",
        date: "2025-06-14",
        readTime: "5",
        tags: ['a', 'b', 'c']
      },
      {
        title: "BBBBBBBBB",
        content: "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        image: "https://picsum.photos/800/450?random=2",
        url: "/posts/BBBBBBBBBB",
        date: "2025-06-14",
        readTime: "3",
        tags: ['c', 'b', 'bb']
      },
      {
        title: "CCCCCCCCC",
        content: "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
        image: "https://picsum.photos/800/450?random=3",
        url: "/posts/CCCCCCCCC",
        date: "2025-06-14",
        readTime: "4",
        tags: ['123', 'asd', 'asdasd']
      }
    ];

    const listEl = document.getElementById('blogList');
    const tagEl = document.getElementById('tagFilter');

    renderCards(temp);
    buildTagOptions();

    document
        .getElementById('addPostBtn')
        .addEventListener('click', addPost);

    function renderCards(arr) {
      listEl.innerHTML = arr.map(buildCard).join('');
    }
    
    function buildTagOptions() {
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
              Posted ${fmtDate(p.date)} · ${p.readTime} min
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