BibliotekaOnline esht ne ndertime e siper

Mos harroni te importoni DB e re

view :CREATE VIEW V_AUTH_NAME_BOOK_ISBN AS 
SELECT author.full_name,book_author.book_id FROM author INNER JOIN book_author on author.id=book_author.author_id
