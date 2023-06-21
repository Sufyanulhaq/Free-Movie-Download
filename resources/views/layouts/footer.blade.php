
<style>
    
        
      /* Add this CSS in your main CSS file or create a separate CSS file for the footer */

footer {
    position: relative;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #f8f8f8;
    padding: 10px 0;
}

.footer-content {
    margin-top: auto; /* Ensures content is pushed to the top of the footer */
}

</style>
<footer>
    <div class="footer-content">
        <div class="container">
            <p>&copy; {{ date('Y') }} FreeMovies. All rights reserved.</p>
        </div>
    </div>
</footer>
