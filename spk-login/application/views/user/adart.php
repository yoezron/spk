<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>


    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#" onclick="changePage('AD-ART')">AD-ART</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#" onclick="changePage('FAQ')">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#" onclick="changePage('Manfaat')">Manfaat</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <iframe id="pageFrame" src="<?= base_url('user/pdf_viewer'); ?>" style="width: 100%; height: 800px; border: none;"></iframe>
        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->

<script>
    function changePage(pageName) {
        var frame = document.getElementById('pageFrame');
        switch (pageName) {
            case 'AD-ART':
                frame.src = '<?= base_url('user/pdf_viewer'); ?>';
                setActiveTab('AD-ART');
                break;
            case 'FAQ':
                frame.src = '<?= base_url('user/faq'); ?>'; // Ganti dengan URL FAQ Anda
                setActiveTab('FAQ');
                break;
            case 'Manfaat':
                frame.src = '<?= base_url('user/manfaat'); ?>'; // Ganti dengan URL Info Anda
                setActiveTab('Manfaat');
                break;
            default:
                break;
        }
    }

    function setActiveTab(tabName) {
        var tabs = document.querySelectorAll('.nav-link');
        tabs.forEach(function(tab) {
            if (tab.innerHTML === tabName) {
                tab.classList.add('active');
                tab.setAttribute('aria-current', 'true');
            } else {
                tab.classList.remove('active');
                tab.setAttribute('aria-current', 'false');
            }
        });
    }
</script>