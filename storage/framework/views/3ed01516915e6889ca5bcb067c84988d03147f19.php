<?php if(!env('HIDE_COD',false)): ?>
    <div class="text-center" id="totalSubmitCOD"  style="display: <?php echo e(env('DEFAULT_PAYMENT','cod')=="cod"&&!env('HIDE_COD',false)?"block":"none"); ?>;" >
        <button
            v-if="totalPrice"
            type="submit"
            class="btn btn-success mt-4 paymentbutton"
            onclick="this.disabled=true;this.form.submit();"
        ><?php echo e(__('Place order')); ?></button>
    </div>
<?php endif; ?>
<?php /**PATH /home/w6p8xbo4k5si/public_html/resources/views/cart/payments/cod.blade.php ENDPATH**/ ?>