<?php
define ("SIGN_BIT" ,0x80);
define ("QUANT_MASK" ,0xf);
define ("BIAS" ,0x84);
define ("SEG_SHIFT" ,4);
define ("SEG_MASK" ,0x70);

// Converts ulaw to 16 bit signed lin
function ulaw2lin($u_val)
{
        $u_val = ~$u_val;
        $t = (($u_val & QUANT_MASK) << 3) + BIAS;
        $t <<= ($u_val & SEG_MASK) >> SEG_SHIFT;
        return /*pack("s",*/intval(($u_val & SIGN_BIT) ? (BIAS - $t) : ($t - BIAS))/*)*/;
}
?>
