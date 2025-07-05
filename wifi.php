<?php
$ssid = shell_exec('netsh wlan show interfaces');
preg_match('/^\s*SSID\s*:\s*(.+)$/m', $ssid, $matches);
if (isset($matches[1])) {
    echo "Wi-Fi Name (SSID): " . trim($matches[1]);
} else {
    echo "SSID not found.";
}
?>
