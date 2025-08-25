#include <stdio.h>
#include <string.h>

void reverse(char *str);

int main() {
    char str[] = "Hello World!";
    reverse(str);

    printf(str);
}

void reverse(char *str) {
    char *start = str;
    char *end = str + strlen(str) - 1;

    while (start < end) {
        const char temp = *end;
        *end = *start;
        *start = temp;
        
        start++;
        end--;
    }
}
