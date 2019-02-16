# Alternatives

For example, with multiple PHP installations (doesn't have to be with plesk, just using it in this example)

```bash
# sudo update-alternatives --install  <link> <name> <real path> <priority>
sudo update-alternatives --install "/usr/bin/php" "php" "/opt/plesk/php/5.6/bin/php" 1
sudo update-alternatives --install "/usr/bin/php" "php" "/opt/plesk/php/7.0/bin/php" 2

# show it
sudo update-alternatives --display php

# set it (requires install first)
sudo update-alternatives --set php /opt/plesk/php/5.6/bin/php
```