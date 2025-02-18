<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="js/app.js"></script>


<script>
    // JavaScript to toggle the sidebar visibility
    document.getElementById('hamburger').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        // If sidebar is hidden, make it slide in from the left by removing translate-x-full
        if (sidebar.classList.contains('hidden')) {
            sidebar.classList.remove('hidden');
            setTimeout(() => {
                sidebar.classList.remove('-translate-x-full');  // Animate the sidebar sliding in from the left
            }, 10); // Small delay to allow transition to take effect
        }
    });

    document.getElementById('close-sidebar').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.add('-translate-x-full'); // Slide out the sidebar to the left
        setTimeout(() => {
            sidebar.classList.add('hidden'); // Hide sidebar after animation completes
        }, 300); // Wait for the slide-out animation to complete (300ms)
    });
</script>
