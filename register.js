document.addEventListener('DOMContentLoaded', () => {
	const form = document.querySelector('form');
	const fullnameInput = document.getElementById('fullname');
	const emailInput = document.getElementById('email');
	const passwordInput = document.getElementById('password');

	// Membuat elemen untuk pesan kesalahan
	const createErrorMessage = (message) => {
			const errorDiv = document.createElement('div');
			errorDiv.className = 'error-message';
			errorDiv.style.color = 'red';
			errorDiv.style.fontSize = '0.9em';
			errorDiv.textContent = message;
			return errorDiv;
	};

	// Menghapus pesan kesalahan sebelumnya
	const clearErrorMessage = (input) => {
			const parent = input.parentElement;
			const existingError = parent.querySelector('.error-message');
			if (existingError) {
					parent.removeChild(existingError);
			}
	};

	// Event 1: Validasi panjang nama lengkap
	fullnameInput.addEventListener('blur', () => {
			clearErrorMessage(fullnameInput);
			if (fullnameInput.value.length <= 3) {
					const error = createErrorMessage('Nama lengkap harus lebih dari 3 karakter.');
					fullnameInput.parentElement.appendChild(error);
			}
	});

	// Event 2: Validasi format email
	emailInput.addEventListener('blur', () => {
			clearErrorMessage(emailInput);
			const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			if (!emailRegex.test(emailInput.value)) {
					const error = createErrorMessage('Masukkan email dengan format yang valid.');
					emailInput.parentElement.appendChild(error);
			}
	});

	// Event 3: Validasi panjang password
	passwordInput.addEventListener('blur', () => {
			clearErrorMessage(passwordInput);
			if (passwordInput.value.length < 8) {
					const error = createErrorMessage('Password harus memiliki panjang minimal 8 karakter.');
					passwordInput.parentElement.appendChild(error);
			}
	});

	// Validasi akhir sebelum submit
	form.addEventListener('submit', (event) => {
			let valid = true;

			// Validasi nama lengkap
			clearErrorMessage(fullnameInput);
			if (fullnameInput.value.length <= 3) {
					const error = createErrorMessage('Nama lengkap harus lebih dari 3 karakter.');
					fullnameInput.parentElement.appendChild(error);
					valid = false;
			}

			// Validasi email
			clearErrorMessage(emailInput);
			const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			if (!emailRegex.test(emailInput.value)) {
					const error = createErrorMessage('Masukkan email dengan format yang valid.');
					emailInput.parentElement.appendChild(error);
					valid = false;
			}

			// Validasi password
			clearErrorMessage(passwordInput);
			if (passwordInput.value.length < 8) {
					const error = createErrorMessage('Password harus memiliki panjang minimal 8 karakter.');
					passwordInput.parentElement.appendChild(error);
					valid = false;
			}

			if (!valid) {
					event.preventDefault();
			}
	});
});
