#!/bin/bash
# generate a new style sheet with new colors
# reset style settings back to original
cp style.css style.back."$(date +%s%N)".css
cp style.original.css style.css


line=$(($1+2))
new_colors=( $( sed 's/,//g;'"$line"'q;d' colorschemes.csv ) )
old_colors=( $( sed 's/,//g;2q;d' colorschemes.csv ) )

# set colors for links and highlighted content
sed -i "s/${old_colors[3]}/${new_colors[3]}/" style.css
sed -i "s/${old_colors[2]}/${new_colors[2]}/" style.css
