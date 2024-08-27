document.addEventListener("DOMContentLoaded", function () {
  const tocGroup = document.querySelectorAll(".toc");
  const prose = document.querySelector(".blog-content");
  const headings = prose?.querySelectorAll("h2");
  const toc_div = document.getElementById("toc_div");

//   const icon = document.querySelector(".separator svg");

  if (!tocGroup || !prose || !headings ) return;

  if (headings.length < 1) {
      tocGroup.forEach((toc) => {
        toc_div.style.display = "none";
    //   toc.innerText = "متاسفانه هیچ عنوانی یافت نشد!";
    });

    return;
  }    console.log(headings);

  headings.forEach(function (heading, index) {
    // Create a unique ID for each heading
    const id = "section-" + index;
    heading.setAttribute("id", id);

    // Create a list item for the TOC
    const li = document.createElement("li");
    li.classList.add("flex", "flex-row-reverse", "justify-between", "p-1");
    const a = document.createElement("a");
    // const svg = icon.cloneNode(true);
    // svg.classList.add("min-w-4");

    a.textContent = heading.textContent;
    a.setAttribute("href", "#" + id);
    // li.appendChild(svg);
    li.appendChild(a);

    tocGroup.forEach((toc) => {
      const liClone = li.cloneNode(true);
      toc.appendChild(liClone);
    });
  });
});
