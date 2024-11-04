#!/bin/sh

set -e

# trust the repo
# fixes:
# - fatal:   detected dubious ownership in repository at '/workspaces/{project}'.
git config --global --add safe.directory "$PWD"

