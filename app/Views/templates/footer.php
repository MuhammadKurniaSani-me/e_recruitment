<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <div class="environment">

        <p>some messages</p>

    </div>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?>
            E-Recruitment Foundation. E-Recruitment is open source project released under the MIT open source licence.
        </p>

    </div>

</footer>

<!-- SCRIPTS -->

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->