import './bootstrap';
import 'select2/dist/css/select2.min.css';
import 'select2';
document.addEventListener('DOMContentLoaded', () => {
    const fileInputs = document.querySelectorAll('input[type="file"]');
    
    fileInputs.forEach(input => {
        input.addEventListener('change', function (event) {
            const fileNameElement = document.getElementById(`fileName_${this.name}`);
            const file = this.files[0];
            if (file) {
                fileNameElement.textContent = `Archivo seleccionado: ${file.name}`;
                fileNameElement.style.display = 'block';
            } else {
                fileNameElement.style.display = 'none';
            }
        });
    });
});


