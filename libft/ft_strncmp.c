/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strncmp.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/17 21:50:03 by shcohen           #+#    #+#             */
/*   Updated: 2018/06/19 17:42:22 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

int		ft_strncmp(const char *s1, const char *s2, size_t n)
{
	size_t	i;

	i = 0;
	if (n == 0)
		return (0);
	while (s1[i] && s2[i] && s1[i] == s2[i] && i < n - 1)
		i++;
	return (((unsigned char *)s1)[i] - ((unsigned char *)s2)[i]);
}
