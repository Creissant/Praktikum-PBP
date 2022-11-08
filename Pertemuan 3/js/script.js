// Fahrel Gibran Alghany
// 24060120130106
// B2

// Memunculkan ekstrakurikuler jika kelas X dan XI
// Menghilangkan ekstrakurikuler jika kelas XII atau kosong
const toggleExtra = () => {
	const extra = document.getElementById('extra');
	const kelas = document.getElementById('kelas').value;
	extra.classList[kelas == 'XII' ? 'add' : 'remove']('hidden');
};

// Menghilangkan alert ketika user mengeklik icon close
const hideAlert = () => {
	const alert = document.getElementById('close_alert');
	alert.classList.add('hidden');
};
