function confirmDelete(id) {
    return confirm("Apakah Anda yakin ingin menghapus item ini?");
}
function checkDeadlines() {
    let today = new Date().toISOString().split('T')[0];
    document.querySelectorAll('.task-item').forEach(task => {
        let deadline = task.getAttribute('data-deadline');
        if (deadline < today) {
            task.style.color = 'red';
            alert("Tugas '" + task.getAttribute('data-name') + "' sudah melewati deadline!");
        }
    });
}
window.onload = checkDeadlines;