/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strmap.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/25 20:49:29 by shcohen           #+#    #+#             */
/*   Updated: 2018/05/25 21:08:33 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strmap(const char *str, char (*f)(char))
{
	int		i;
	char	*pstr;
	int		len;

	i = 0;
	len = ft_strlen(((char*)str));
	pstr = malloc(sizeof(char*) * len);
	if (!pstr)
		return (NULL);
	while (str[i])
	{
		pstr[i] = (*f)(str[i]);
		i++;
	}
	return (pstr);
}
