#include <ctype.h>
#include <stdio.h>

int count_vowels(const char *text);
int lower(char c);

int main() {
    const char text[] = "I am an object in motion, and I've lost all emotion, my two legs are broken, but look me dance.";
    const int vowels = count_vowels(text);

    printf("The phrase has %d vowels", vowels);

    printf("\n%d %d %d %d", 'a', 'z', 'A', 'Z');
    printf("\n%c %c %c %c", lower('a'), lower('A'), lower('z'), lower('Z'));
}

int count_vowels(const char *text) {
    int vowels = 0;
    const char *pointer = text;

    while (*pointer != '\0') {
        const int c = tolower(*pointer);
        if (c == 'a' || c == 'e' || c == 'i' || c == 'o' || c == 'u') vowels++;
        *pointer++;
    }

    return vowels;
}

int lower(const char c) {
    if (c < 'A' || c > 'Z') return c;
    return c + 32;
}