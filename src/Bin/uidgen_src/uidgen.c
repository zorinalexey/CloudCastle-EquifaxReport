/* =================================================================== *
 * Пример использования функции генерации уникального идентификатора   *
 * договора (сделки) в соответствии с указанием Банка России           *
 * "О правилах присвоения уникального идентификатора договора (сделки),*
 * по обязательствам из которого (из которой) формируется кредитная    *
 * история"                                                            *
 * =================================================================== */
 
#include <stdio.h>
#include <stdlib.h>

#include "uid.h"

//Демонстрация работы функции генерации УИД


int main(int argc, char **argv)
{
	//Количество УИД, которые необходимо сгенерировать. По-умолчанию - один.
	int cnt = 1;
	
	//Если переданы аргументы командной строки
	if(argc>1) {
		//Прочитаем количество из первого аргумента
		cnt=atoi(argv[1]);		
	}
	
	//Инициализация модуля генерации УИД.
    if(!uid_init()) {
		//Если инициализация не удалась, функция генерации УИД
		//не будет возвращать корректный результат,
		//поэтому завершим работу демонстрационного приложения.
		fprintf(stderr, "UID unit not inited\n");
		return 1;
	}
    
    //буфер для УИД
    char buf[UID_BUFFER_SIZE];
    
	int i;
	//цикл по количеству необходимых УИД
    for(i=0; i<cnt; i++) {
		//Создание УИД
		if(uid_create(buf)){
			//Если УИД сгенерирован успешно, выводим на печать
			printf("%s\n",buf);
		} else {
			//Иначе выводим сообщение об ошибке и завершаем работу
			fprintf(stderr, "Can't create UID\n");
			break;
		}		
	}
    
    //Деинициализация модуля генерации УИД
    //(освобождение выделенных ресурсов)
    uid_deinit();
    
    
    return i<cnt? 1:0;
}
