<?php
$attrs = '';
$class = 'mbt-input-field';

if ( isset( $field['size'] ) && !empty( $field['size'] ) ) {
    $attrs .= ' size="' . $field['size'] . '"';
}
if ( isset( $field['maxlength'] ) && !empty( $field['maxlength'] ) ) {
    $attrs .= ' maxlength="' . $field['maxlength'] . '"';
}

if ( isset( $field['class'] ) && !empty( $field['class'] ) ) {
    $class .= ' ' . $field['class'];
}
?>
<input type="number" id="<?php echo $id; ?>" name="<?php echo $id; ?>" class="<?php echo $class; ?>" value="<?php echo $value; ?>"<?php echo $attrs; ?> />
