FILE=storage/buckup_`date +"%Y.%m.%d_%H-%M-%S"`.sql
DBSERVER=mysql
DATABASE=lv_app
USER=sail
PASS=password

# (2) in case you run this more than once a day, remove the previous version of the file
# unalias rm     2> /dev/null
# rm ${FILE}     2> /dev/null
# rm ${FILE}.gz  2> /dev/null

# (3) do the mysql database backup (dump)

# use this command for a database server on a separate host:
#mysqldump --opt --protocol=TCP --user=${USER} --password=${PASS} --host=${DBSERVER} ${DATABASE} > ${FILE}

# use this command for a database server on localhost. add other options if need be.
docker exec ddbc32c6a774c8499f8156fe7592416a649bcc63d8bd9af5acf0dc27e4744efa-mysql-1 mysqldump --opt --user=${USER} --password=${PASS} --host=${DBSERVER} --no-tablespaces ${DATABASE} > ${FILE}

# (4) gzip the mysql database dump file
# gzip $FILE

# (5) show the user the result
# echo "${FILE}.gz was created:"
ls -l ${FILE}
