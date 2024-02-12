# figure out workspace 
export WORKSPACE_NAME=$(pwd | awk -F'/' '{for(i=1;i<=NF;i++) if ($i == "workspaces") {print $(i+1); exit}}')
export WORKSPACE_SCRIPT_PATH="/workspaces/$WORKSPACE_NAME/scripts"

# make scripts executable
pushd $WORKSPACE_SCRIPT_PATH > /dev/null
sudo chmod +x *.sh
popd > /dev/null

export PATH="$PATH:$WORKSPACE_SCRIPT_PATH"

# make release alias
alias release='release.sh'

echo ""
echo "To release a new version do:"
echo ""
echo "$ release [patch|minor|major]"
echo ""
