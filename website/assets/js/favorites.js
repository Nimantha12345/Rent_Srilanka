document.addEventListener('DOMContentLoaded', () => {
  const favoritesGrid = document.getElementById('favoritesGrid');
  const favoritesEmptyState = document.getElementById('favoritesEmptyState');
  const navFavCount = document.getElementById('nav-fav-count');
  const favHeaderCount = document.getElementById('favHeaderCount');
  const btnClearAllFavorites = document.getElementById('btnClearAllFavorites');
  
  // Modal Elements
  const removeFavModalEl = document.getElementById('removeFavModal');
  const removeFavModalText = document.getElementById('removeFavModalText');
  const btnConfirmRemoveFav = document.getElementById('btnConfirmRemoveFav');
  let bsRemoveModal = removeFavModalEl ? new bootstrap.Modal(removeFavModalEl) : null;

  let targetCardCol = null;

  // 1. Tab Filtering (All / Houses / Rooms / Annexes)
  const favTabs = document.querySelectorAll('#favTabs button');
  favTabs.forEach(tab => {
    tab.addEventListener('click', function() {
      const selectedType = this.getAttribute('data-type');
      const cards = document.querySelectorAll('.favorite-card-col');

      cards.forEach(card => {
        const cardType = card.getAttribute('data-type');
        if (selectedType === 'all' || cardType === selectedType) {
          card.classList.remove('d-none');
        } else {
          card.classList.add('d-none');
        }
      });
    });
  });

  // 2. Click Remove Heart -> Trigger Confirmation Modal
  if (favoritesGrid) {
    favoritesGrid.addEventListener('click', (e) => {
      const removeBtn = e.target.closest('.btn-remove-fav');
      if (removeBtn) {
        e.preventDefault();
        targetCardCol = removeBtn.closest('.favorite-card-col');
        const title = targetCardCol ? targetCardCol.getAttribute('data-title') : 'this property';

        if (removeFavModalText) {
          removeFavModalText.textContent = `Are you sure you want to remove "${title}" from your saved list?`;
        }

        if (bsRemoveModal) {
          bsRemoveModal.show();
        }
      }
    });
  }

  // 3. Confirm Removal from Modal
  if (btnConfirmRemoveFav) {
    btnConfirmRemoveFav.addEventListener('click', () => {
      if (targetCardCol) {
        targetCardCol.remove();
        targetCardCol = null;
        updateFavoriteCounts();
      }
      if (bsRemoveModal) {
        bsRemoveModal.hide();
      }
    });
  }

  // 4. Clear All Saved Properties
  if (btnClearAllFavorites) {
    btnClearAllFavorites.addEventListener('click', () => {
      if (confirm('Are you sure you want to clear all saved properties?')) {
        const allCards = document.querySelectorAll('.favorite-card-col');
        allCards.forEach(card => card.remove());
        updateFavoriteCounts();
      }
    });
  }

  // Helper Function: Recalculate Totals & Dynamic Tab Counts
  function updateFavoriteCounts() {
    const remainingCards = document.querySelectorAll('.favorite-card-col');
    const totalCount = remainingCards.length;

    // Count per category
    let houseCount = 0;
    let roomCount = 0;
    let annexCount = 0;

    remainingCards.forEach(card => {
      const type = card.getAttribute('data-type');
      if (type === 'house') houseCount++;
      if (type === 'room') roomCount++;
      if (type === 'annex') annexCount++;
    });

    // Update Header Badges & Navbar Counter
    if (navFavCount) navFavCount.textContent = totalCount;
    if (favHeaderCount) favHeaderCount.textContent = `${totalCount} Saved Properties`;

    // Update Tab Labels
    const tabAll = document.getElementById('tab-all');
    const tabHouse = document.getElementById('tab-house');
    const tabRoom = document.getElementById('tab-room');
    const tabAnnex = document.getElementById('tab-annex');

    if (tabAll) tabAll.textContent = `All (${totalCount})`;
    if (tabHouse) tabHouse.textContent = `Houses (${houseCount})`;
    if (tabRoom) tabRoom.textContent = `Rooms (${roomCount})`;
    if (tabAnnex) tabAnnex.textContent = `Annexes (${annexCount})`;

    // Check Empty State
    if (totalCount === 0) {
      if (favoritesGrid) favoritesGrid.classList.add('d-none');
      if (favoritesEmptyState) favoritesEmptyState.classList.remove('d-none');
      if (btnClearAllFavorites) btnClearAllFavorites.classList.add('d-none');
    }
  }
});