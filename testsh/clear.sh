for f in $(l *\?*)
do
ff=${f%\?*}
echo $f to $ff
mv $f $ff
done
