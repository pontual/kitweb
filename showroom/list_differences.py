SITE_CODIGOS = "c:/Users/Heitor/Desktop/emacs-24.3/bin/kitweb/showroom/site_active_codigos.txt"

SHOWROOM_CODIGOS = "c:/Users/Heitor/Desktop/emacs-24.3/bin/kitweb/showroom/showroom_codigos.txt"

def file_to_set(filename):
    result_set = set()
    with open(filename) as file_handle:
        lines = file_handle.readlines()
        for line in lines:
            result_set.add(line.strip())
    return result_set

site_set = file_to_set(SITE_CODIGOS)
showroom_set = file_to_set(SHOWROOM_CODIGOS)

in_site_but_not_in_showroom = site_set.difference(showroom_set)
in_showroom_but_not_in_site = showroom_set.difference(site_set)


