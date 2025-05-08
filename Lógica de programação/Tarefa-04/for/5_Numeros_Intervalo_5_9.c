#include <stdio.h>

int main() {
    int found = 0;
    for (int i = 0; i <= 8; i++) {
        int temp;
        printf("Coloque o número %d: ", i);
        scanf("%d", &temp);

        if (temp >= 5 && temp <= 9) {
            found += 1;
        }
    } 

    printf("Quantidade de números entre 5 e 9: %d\n", found);
    printf("Quantidade de números fora do intervalo: %d\n", 10 - found);
}