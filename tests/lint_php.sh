#!/usr/bin/env bash

set -uo pipefail

project_root="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
php_bin="${PHP_BIN:-php}"

if ! command -v "$php_bin" >/dev/null 2>&1; then
  printf 'No se encontro el ejecutable PHP: %s\n' "$php_bin" >&2
  exit 127
fi

checked=0
failed=0

while IFS= read -r -d '' file; do
  checked=$((checked + 1))
  if ! "$php_bin" -l "$file" >/dev/null; then
    printf 'Error de sintaxis: %s\n' "${file#"$project_root"/}" >&2
    failed=1
  fi
done < <(find "$project_root" -type f -name '*.php' -print0)

printf 'Archivos PHP revisados: %d\n' "$checked"

if [[ "$failed" -ne 0 ]]; then
  exit 1
fi

printf 'Todos los archivos PHP tienen sintaxis valida.\n'