AOS.init();

function showModal(rank) {
  document.getElementById('paymentModal').style.display = 'flex';
  document.getElementById('modalText').innerText = 'Comprar rango ' + rank;
}

function closeModal() {
  document.getElementById('paymentModal').style.display = 'none';
}

function switchLang() {
  const langBtn = document.querySelector('.lang-switch');
  const title = document.getElementById('title');
  if (langBtn.innerText === 'EN') {
    langBtn.innerText = 'ES';
    title.innerText = 'Buy Ranks in Nexus MC';
  } else {
    langBtn.innerText = 'EN';
    title.innerText = 'Compra Rangos en Nexus MC';
  }
}
