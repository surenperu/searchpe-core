#!/usr/bin/env bash
GIT_FILES=($(git show --pretty="" --name-only $CIRCLE_SHA1))
for f in ${GIT_FILES[@]};
do
  if [[ $f == "docs/"* ]] || [ $f == "mkdocs.yml" ]; then
    git config user.name "Alex Pariona";
    git config user.email "lx7pary@gmail.com";
    git remote add gh-token "https://${GH_TOKEN}@github.com/surenperu/searchpe-core.git";
    git fetch gh-token && git fetch gh-token gh-pages:gh-pages;
    pip install -IU -r requirements.txt;
    mkdocs gh-deploy -v --clean --remote-name gh-token --message "Deployed MkDocs version: 0.17.2 [ci skip]";
    break
  fi
done