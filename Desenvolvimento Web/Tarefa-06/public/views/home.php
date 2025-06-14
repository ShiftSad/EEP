<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container py-4">
    <div id="blog-list" class="row">
      <!-- Cards vão ser populados aqui -->
    </div>
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
  },
  {
    title: "BBBBBBBBB",
    content: "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
    image: "https://picsum.photos/800/450?random=2",
    url: "/posts/BBBBBBBBBB",
    date: "2025-06-14",
    readTime: "3",
  },
  {
    title: "CCCCCCCCC",
    content: "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
    image: "https://picsum.photos/800/450?random=3",
    url: "/posts/CCCCCCCCC",
    date: "2025-06-14",
    readTime: "4",
  }
];

renderCards(temp);

function renderCards(posts) {
  const list = document.getElementById('blog-list');

  list.innerHTML = posts
    .map((p) => buildCard(p))
    .join('');
}

function buildCard(post) {
  const imgBlock = post.image
    ? `<div class="ratio ratio-16x9">
         <img
           src="${post.image}"
           class="card-img-top object-fit-cover"
           alt="${post.title}"
         />
       </div>`
    : '';

  return `
    <div class="col-md-6 col-lg-4 mb-4">
      <article class="card h-100 shadow-sm blog-card">
        ${imgBlock}

        <!-- 1️⃣  Make the body a vertical flex-box  -->
        <div class="card-body d-flex flex-column">
          <h5 class="card-title mb-2">${post.title}</h5>

          <!-- text can grow/shrink freely -->
          <p class="card-text text-muted">${post.content}</p>

          <!-- 2️⃣  Push the button to the bottom with mt-auto -->
          <a href="${post.url}"
             class="btn btn-outline-primary mt-auto stretched-link">
            Continue reading
          </a>
        </div>

        <div class="card-footer bg-transparent border-0 small text-muted">
          Posted ${formatDate(post.date)} · ${post.readTime} min read
        </div>
      </article>
    </div>
  `;
}

function formatDate(iso) {
  const date = new Date(iso);
  return date.toLocaleDateString(undefined, {
    year: 'numeric',
    month: 'short',
    day: 'numeric'
  });
}
</script>
</body>
</html>