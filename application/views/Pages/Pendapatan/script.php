<?php if ($this->session->flashdata('status') == '1') { ?>
    <script>
        toastr.success('berhasil');
    </script>
<?php } elseif ($this->session->flashdata('status') == '0') { ?>
    <script>
        toastr.error('gagal');
    </script>
<?php } ?>

<?php if (!empty($edit)) : ?>
    <script>
        var variabels = JSON.parse('<?= $edit ?>');
        $('[name = "id_pendapatan"]').val(variabels.id_pendapatan);
        $('[name = "tahun"]').val(variabels.tahun);
        $('[name = "jenis_pendapatan"]').val(variabels.jenis_pendapatan);
        $('[name = "jumlah"]').val(variabels.jumlah);
        $('[name = "tanggal"]').val(variabels.tanggal);
        $("#simpan").text('Edit').removeClass('btn-primary').addClass('btn-success');
    </script>
<?php endif ?>
