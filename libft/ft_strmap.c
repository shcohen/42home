/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strmap.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/25 20:49:29 by shcohen           #+#    #+#             */
/*   Updated: 2018/06/12 16:33:11 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strmap(const char *str, char (*f)(char))
{
	int		i;
	char	*pstr;
	int		len;

	i = 0;
	if (!str)
		return (NULL);
	len = ft_strlen(str);
	pstr = malloc(sizeof(char) * (len + 1));
	if (!pstr || !str || !f)
		return (NULL);
	while (str[i])
	{
		pstr[i] = (*f)(str[i]);
		i++;
	}
	pstr[i] = '\0';
	return (pstr);
}
