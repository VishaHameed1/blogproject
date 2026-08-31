#!/bin/bash
# Starts MariaDB + Apache for local dev in this sandbox.
# Note: background services here don't survive between separate tool calls,
# so on a real host you'd normally just enable systemd units instead.

set -e

echo "Starting MariaDB..."
nohup mysqld_safe --datadir=/var/lib/mysql > /var/log/mysqld_safe.log 2>&1 &
for i in $(seq 1 15); do
  if mysqladmin -u root ping 2>/dev/null | grep -q alive; then
    echo "  MariaDB is up."
    break
  fi
  sleep 1
done

echo "Starting Apache (site on port 8080)..."
service apache2 start

echo "Done. App should be reachable at http://127.0.0.1:8080 once composer install has run."
