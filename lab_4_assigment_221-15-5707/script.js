const products = [
    {
      name: "coffee",
      image: "coffee.jpeg",
      price: 24.99,
      discount: 20, // percentage
      applyDiscount: true,
    },
    {
      name: "pasta",
      image: "pasta.jpeg",
      price: 29.99,
      discount: 10,
      applyDiscount: true,
    },
    {
      name: "pizza",
      image: "pizza.jpeg",
      price: 19.99,
      discount: 0,
      applyDiscount: false,
    },
    {
      name: "burger",
      image: "burger.jpeg",
      price: 34.99,
      discount: 15,
      applyDiscount: true,
    }
  ];
  
  const productList = document.getElementById("productGrid");
  let cartCount = 0;
  
  function updateCartCount() {
    document.getElementById("cartCount").textContent = cartCount;
  }
  
  function renderProducts() {
    products.forEach((product, index) => {
      const discountedPrice = product.applyDiscount
        ? (product.price * (1 - product.discount / 100)).toFixed(2)
        : product.price.toFixed(2);
  
      const card = document.createElement("div");
      card.className = "product-card";
      card.innerHTML = `
        <img src="${product.image}" alt="${product.name}" />
        <h3>${product.name}</h3>
        ${product.applyDiscount
          ? `<span class="price-old">$${product.price.toFixed(2)}</span>
             <span class="price-new">$${discountedPrice}</span>`
          : `<p>$${product.price.toFixed(2)}</p>`}
        
        <div class="quantity-controls">
          <button onclick="decreaseQty(${index})">-</button>
          <span id="qty-${index}">0</span>
          <button onclick="increaseQty(${index})">+</button>
        </div>
  
        <button class="add-to-cart-btn" onclick="addToCart(${index})">Add to Cart</button>
      `;
  
      productList.appendChild(card);
      product.quantity = 0;
    });
  }
  
  function increaseQty(index) {
    const qtyElement = document.getElementById(`qty-${index}`);
    let quantity = parseInt(qtyElement.textContent);
    quantity++;
    qtyElement.textContent = quantity;
    products[index].quantity = quantity;
  }
  
  function decreaseQty(index) {
    const qtyElement = document.getElementById(`qty-${index}`);
    let quantity = parseInt(qtyElement.textContent);
    if (quantity > 0) {
      quantity--;
      qtyElement.textContent = quantity;
      products[index].quantity = quantity;
    }
  }
  
  function addToCart(index) {
    const qty = products[index].quantity;
    if (qty > 0) {
      cartCount += qty;
      updateCartCount();
      products[index].quantity = 0;
      document.getElementById(`qty-${index}`).textContent = 0;
      alert(`${qty} ${products[index].name}${qty > 1 ? "s" : ""} added to cart!`);
    } else {
      alert("Please add quantity first!");
    }
  }
  
  function showOfferPopup() {
    const modal = document.getElementById("offerModal");
    modal.style.display = "block";
  }
  
  function closeOfferPopup() {
    const modal = document.getElementById("offerModal");
    modal.style.display = "none";
  }
  
  // Simple search function - filters product cards by name
  function searchProducts() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const cards = document.querySelectorAll(".product-card");
  
    cards.forEach((card, index) => {
      const productName = products[index].name.toLowerCase();
      if (productName.includes(input)) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
  }
  
  // Wait until DOM is loaded before rendering products and showing popup
  document.addEventListener("DOMContentLoaded", () => {
    renderProducts();
    updateCartCount();
  
    // Show offer popup automatically on page load
    showOfferPopup();
  });
  