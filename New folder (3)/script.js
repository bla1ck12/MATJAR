
// This is where we could load products dynamically if we had a backend API.
document.addEventListener("DOMContentLoaded", function() {
  fetch('view_products.php')
    .then(response => response.json())
    .then(data => {
      const productList = document.getElementById('products-list');
      data.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('product');
        productDiv.innerHTML = `<h3>${product.name}</h3><p>السعر: ${product.price} درهم</p><p>${product.description}</p>`;
        productList.appendChild(productDiv);
      });
    })
    .catch(error => console.log(error));
});
