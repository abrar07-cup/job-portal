        </div> <!-- Close container from header -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Portfolio+</h5>
                    <p>The best place to find your dream job or the perfect candidate for your company.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">Home</a></li>
                        <li><a href="jobs.php" class="text-white">Browse Jobs</a></li>
                        <li><a href="about.php" class="text-white">About Us</a></li>
                        <li><a href="contact.php" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Connect With Us</h5>
                    <div class="social-links">
                        <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                    </div>


                    

                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; <?= date('Y') ?> JobPortal+. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../assets/js/script.js"></script> -->




<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('darkModeToggle');
    const toggleText = document.querySelector('.toggle-text');
    
    // Check for saved theme preference
    const savedTheme = localStorage.getItem('theme');
    
    // Apply saved theme if exists
    if (savedTheme === 'dark') {
      document.body.classList.add('dark-mode');
      toggle.checked = true;
      toggleText.textContent = 'Light Mode';
    } else {
      toggleText.textContent = 'Dark Mode';
    }
    
    // Toggle theme when switch is clicked
    toggle.addEventListener('change', function() {
      if (this.checked) {
        document.body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark');
        toggleText.textContent = 'Light Mode';
      } else {
        document.body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light');
        toggleText.textContent = 'Dark Mode';
      }
    });
  });
</script>





</body>
</html>