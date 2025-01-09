<?php
// Default values for modal properties
$modalId = $modalId ?? 'defaultModal';
$modalTitle = $modalTitle ?? 'Modal Title';
$modalContent = $modalContent ?? '<p>No content provided.</p>';
?>

<div id="<?= htmlspecialchars($modalId) ?>" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('<?= $modalId ?>')">&times;</span>
        <h2><?= htmlspecialchars($modalTitle) ?></h2>
        <div class="modal-body">
            <?= $modalContent ?>
        </div>
    </div>
</div>
