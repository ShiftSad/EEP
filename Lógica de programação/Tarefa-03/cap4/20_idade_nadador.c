#include <stdio.h>

int main() {
    int idade;
    char categoria[20];

    printf("Digite a idade do nadador: ");
    scanf("%d", &idade);

    if (idade >= 5 && idade <= 7) {
        sprintf(categoria, "Infantil");
    } else if (idade >= 8 && idade <= 10) {
        sprintf(categoria, "Juvenil");
    } else if (idade >= 11 && idade <= 15) {
        sprintf(categoria, "Adolescente");
    } else if (idade >= 16 && idade <= 30) {
        sprintf(categoria, "Adulto");
    } else if (idade > 30) {
        sprintf(categoria, "Senior");
    } else {
        sprintf(categoria, "Idade invalida");
    }

    printf("Categoria: %s\n", categoria);
}