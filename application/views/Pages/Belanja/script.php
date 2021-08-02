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
        $('[name = "id_belanja"]').val(variabels.id_belanja);
        $('[name = "tahun"]').val(variabels.tahun);
        $('[name = "jenis_belanja"]').val(variabels.jenis_belanja);
        $('[name = "jumlah"]').val(variabels.jumlah);
        $('[name = "tanggal"]').val(variabels.tanggal);
        $("#simpan").text('Edit').removeClass('btn-primary').addClass('btn-success');
    </script>
<?php endif ?>
