<?php

echo '
<div class="sng-social">
      <span>' . esc_html__( "share", "wizedesign" ) . '</span>
      <a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url( get_permalink() ) . '" target="_blank"><div class="sng-facebook"></div></a>
      <a href="https://twitter.com/home?status=' . esc_url( get_permalink() ) . '" target="_blank"><div class="sng-twitter"></div></a>
      <a href="https://plus.google.com/share?url=' . esc_url( get_permalink() ) . '" target="_blank"><div class="sng-google"></div></a>
      <a href="http://www.linkedin.com/shareArticle?mini=true&url=' . esc_url( get_permalink() ) . '" target="_blank"><div class="sng-linkedin"></div></a>
</div><!-- end .sng-social -->';

?>
