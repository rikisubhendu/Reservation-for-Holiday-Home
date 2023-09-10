function closeAlert(button) {
    const alert = button.closest('.alert');
    if (alert) {
        const section = alert.closest('section');
        alert.style.display = 'none';
        section.style.display = 'none'; // Close the section
    }
  }